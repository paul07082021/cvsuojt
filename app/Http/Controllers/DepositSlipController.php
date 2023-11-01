<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\GpUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

// error_reporting(E_ALL);
ini_set('display_errors', 1);
class DepositSlipController extends Controller{
    
    
            public function checkAndResetTotalAmount(){
                $currentTime = now();
                $midnight = $currentTime->copy()->startOfDay();
            
                if ($currentTime->greaterThanOrEqualTo($midnight)) {
                    $date = date('Y:m:d');
            
                    $userData = DB::table('gp_users')
                        ->select('username', 'contact', 'total_amount')
                        ->get();
            
                    $userData->each(function ($user) use ($date, $currentTime) {
                        DB::table('totals_tb')->insert([
                            'username' => $user->username,
                            'contact' => $user->contact,
                            'total_amount' => $user->total_amount,
                            'date_deposited' => $date,
                            'status' => 'Enabled',
                            'time' => $currentTime
                        ]);
                    });
            
                    DB::table('gp_users')->update(['total_amount' => 0]);
                }
            }

    public function getparams(Request $request) {
    $hash = 'tOBjHF62vXZodSW0eazyObpQcO2mE309';
    $data_transactionId = $request->input('data_transactionId');
    $data_amount = $request->input('data_amount');
    $data_mobilenum = $request->input('data_mobilenum');
    $token = $request->input('gptk');

    $hashtoken = md5($hash);

    // Check for missing parameters
    if (!$data_transactionId || !$data_mobilenum || !$data_amount) {
        return response()->json(['error' => 'Code Error Params'], 401);
    } elseif ($token !== $hashtoken) {
        return response()->json(['error' => 'Code Error'], 401);
    } else {
        
            $get_limits = DB::table('gp_users')
              ->select('id', 'total_amount_limit', 'total_amount_monthly_limit')
              ->get();
            
            $limits = [];
            foreach ($get_limits as $user) {
              $limits[$user->id] = [
                'total_amount_limit' => $user->total_amount_limit,
                'total_amount_monthly_limit' => $user->total_amount_monthly_limit,
              ];
            }
            
            // Check monthly limits
            $disabledUsers = []; 
            foreach ($limits as $userId => $userLimits) {
              $monthlyTotal = DB::table('total_tb')
                ->where('agent_id', $userId)
                ->whereBetween('date', [
                  Carbon::now()->firstOfMonth(),  
                  Carbon::now()->lastOfMonth()   
                ])
                ->sum('total_amount');
            
              if ($monthlyTotal >= $userLimits['total_amount_monthly_limit']) {
                $disabledUsers[] = $userId;
              }
            }
            
            // Disable monthly exceeded users
            if (!empty($disabledUsers)) {
              DB::table('gp_users')
                ->whereIn('id', $disabledUsers)
                ->update(['status' => 'Disabled']);
            
              DB::table('total_tb')
                ->whereIn('agent_id', $disabledUsers)
                ->update(['status' => 'Disabled']); 
            }
            
            // Check daily limits  
            $disabledUsers = [];
            foreach ($limits as $userId => $userLimits) {
              $dailyTotal = DB::table('total_tb')
                ->where('agent_id', $userId)
                ->whereDate('date', Carbon::today())
                ->sum('total_amount');  
            
              if ($dailyTotal >= $userLimits['total_amount_limit']) {
                $disabledUsers[] = $userId;
              }
            }
            
            // Disable daily exceeded
            if (!empty($disabledUsers)) {
              // Same disable logic
              DB::table('gp_users')
                ->whereIn('id', $disabledUsers)
                ->update(['status' => 'Disabled']);
            
              DB::table('total_tb')
                ->whereIn('agent_id', $disabledUsers)
                ->update(['status' => 'Disabled']);
            }
            
            // Get current users
            $autodisabledUsers = DB::table('gp_users')
              ->leftJoin('total_tb', function ($join) {
                $join->on('gp_users.id', '=', 'total_tb.agent_id')
                  ->where('total_tb.date', '>=', Carbon::now()->firstOfMonth()->format('Y-m-01'))
                  ->where('total_tb.date', '<=', Carbon::now()->lastOfMonth()->format('Y-m-d'));
              })
              ->select('gp_users.id', 'gp_users.username', 'gp_users.contact', 'gp_users.status')
              ->where('gp_users.status', 'Enabled') 
              ->get();
            
            // Filter out disabled users  
            $filtered_users = $autodisabledUsers->whereNotIn('id', $disabledUsers); 
            
            $input_amount = (float) $data_amount; 
            
            // Get current totals
            $getcurrent_total_amount = DB::table('gp_users')
              ->leftJoin('total_tb', function ($join) {
                $join->on('gp_users.id', '=', 'total_tb.agent_id')
                  ->whereDate('total_tb.date', '=', date('Y-m-d'));
              })
              ->select('gp_users.id', 'gp_users.username', 'gp_users.contact', 'gp_users.status', 'gp_users.total_amount_limit', 'total_tb.total_amount')
              ->where('gp_users.status', 'Enabled')
              ->get();
        
        // Subtract the total_amount from the maxlimit for each user
        $remaining_amounts = [];
        foreach ($getcurrent_total_amount as $user) {
            
            $limit = isset($limits[$user->id]['total_amount_limit']) ? $limits[$user->id]['total_amount_limit'] : 0;
        
            
            $totalAmount = is_numeric($user->total_amount) ? $user->total_amount : 0;
        
            // Calculate remaining_amount
            $remaining_amount = $limit - $totalAmount;
        
            
            $remaining_amounts[$user->id] = max($remaining_amount, 0);
        }
        
        // Filter users with remaining_amount greater than or equal to input_amount
        $filtered_users = $getcurrent_total_amount->filter(function ($user) use ($input_amount, $remaining_amounts) {
            $remaining = isset($remaining_amounts[$user->id]) ? $remaining_amounts[$user->id] : 0;
        
            // Perform the comparison
            return $remaining >= $input_amount;
        });
        
        if ($filtered_users->isEmpty()) {
                $redirect_url = "https://galaxypay.online/ewallet/notavailable";
                return Redirect::to($redirect_url);
                //return url('no-agent');
                //echo "No available agent. please contact Customer Support";
            }
            else{
                
        // Check if there's an existing contact in the session
        $existingContact = session('contact');
        
        // Check if the filtered users contain the existing contact
        if ($existingContact && $filtered_users->contains('contact', $existingContact)) {
            // Use the existing contact from the session
            $randomContact = $filtered_users->where('contact', $existingContact)->first();
        } else {
            // Get a random user from the filtered list
            $randomContact = $filtered_users->random();
            
            
            // Store the new contact in the session
            session()->put('contact', $randomContact->contact);
        }
        
        // Set expiration for the session
        session()->put('expires_at', now()->addSeconds(600));

        return view('deposit-slip', [
            'data_transactionId' => $data_transactionId,
            'data_amount' => $data_amount,
            'data_mobilenum' => $data_mobilenum,
            'randomContact' => $randomContact,
            'username' => $randomContact->username,
            'img' => $randomContact->img,
            'id' => $randomContact->id
        ]);
        
        }
        
    }
}




    public function submitDeposit(Request $request)
{
    date_default_timezone_set('Asia/Karachi');
    $date = date('Y-m-d');
    $time = date('H:i:s');

    $merchantnum = $request->input('data_mobilenum');
    $transactionId = $request->input('data_transactionId');
    $referenceNum = $request->input('up_referenceNum');
    $amount = $request->input('amount');
    $contact = $request->input('contact');
    $username = $request->input('agentname');
    $agentId = $request->input('agentId');

    //if (!$request->hasFile('file')) {
    //    $message = 'Please upload an image';
   //     session()->flash('errorimage', $message);
   //     return redirect()->back()->with('errorimage', $message);
  //  }
    
    
    $resultreference = DB::table('apk_logs')
                    ->select('agentNumber', 'Username', 'referenceId', 'amount')
                    ->where('referenceId', $referenceNum)
                    ->exists();
                    
   if ($resultreference === false) {
            $message = 'Invalid or Already Claimed';
            session()->flash('error', $message);
            return redirect()->back()->with('error', $message);
        }else{
            //var_dump($resultreference);
   // $image = $request->file('file');
   // $imageName = $transactionId . '_' . $referenceNum . '.' . $image->getClientOriginalExtension();
  //  $image->move(public_path('images'), $imageName);


    $apitoken_endpoint = "https://gphost.cloud/api/token-authentication";
    $tokenData = [
        'userName' => "webauthentication@spadmond.com",
        'password' => "m]Hf-S3(npy:iPalSYd[STLta+m8[-Y&"
    ];

    // Convert the data to JSON
    $jsonData = json_encode($tokenData);

    // Set the cURL options
    $curlToken = curl_init($apitoken_endpoint);
    curl_setopt($curlToken, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlToken, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData),
    ]);
    curl_setopt($curlToken, CURLOPT_POSTFIELDS, $jsonData);

    // Send the POST request
    $responsetoken = curl_exec($curlToken);
    $httpStatus = curl_getinfo($curlToken, CURLINFO_HTTP_CODE);


    if ($httpStatus === 401) {
        $message = '401 - Unathorized';
        session()->flash('Error', $message);
        echo '<script>
                window.location=document.referrer;
             </script>';
    } else {
        curl_close($curlToken);

        $responseData = json_decode($responsetoken, true);

        $jwttoken = $responsetoken;

        $api_endpoint = "https://gphost.cloud/api/deposit-confirmation";

        $post_data = [
            'transactionId' => $transactionId,
            'referenceId' => $referenceNum,
            'phoneNumber' => $contact,
            'amount' => doubleval($amount)
        ];

        $apiHeader = array(
            "Authorization: Bearer " . $jwttoken,
            "Content-Type: application/json"
        );

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $api_endpoint);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $apiHeader);

        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $responseMessage = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
        $responseData = json_decode($response);


        DB::table('deposit_tb')->insert([
            'merchant' => $merchantnum,
            'agent_id' => $agentId,
            'transactionId' => $transactionId,
            'referencenum' => $referenceNum,
            'amount' => $amount,
            'contact' => $contact,
            'username' => $username,
            'Status' => $responseData->status,
            'message' => $response,
            'date_deposited' => $date,
            'time' => $time,
        ]);

            
            if ($httpcode !== 200) {
            $message = 'An Error occurred while submitting your Deposit. Please try again later.';
            session()->flash('error', $message);
            return redirect()->back()->with('error', $message);
        } else {
            if (isset($responseData->status) && $responseData->status === "Error" || isset($responseData->status) && $responseData->status !== 'Success') {
                //var_dump($responseData);
                $message = 'Invalid or Already Claimed';
                session()->flash('error', $message);
                return redirect()->back()->with('error', $message);
            } else {
                date_default_timezone_set('Asia/Karachi');

                $result = DB::table('total_tb')
                    ->select('agent_id', 'date', 'total_amount')
                    ->where('agent_id', $agentId)
                    ->where('date', date('Y-m-d'))
                    ->first();

                $total = $result->total_amount;
                $totalresult = $amount + $total;

                if ($result == true) {
                    $result = DB::table('total_tb')
                        ->select('agent_id', 'date', 'total_amount')
                        ->where('agent_id', $agentId)
                        ->where('date', date('Y-m-d'))
                        ->update(['total_amount' => $totalresult]);
                } else {
                    DB::table('total_tb')->insert([
                        'agent_id' => $agentId,
                        'date' => date('Y-m-d'),
                        'status' => 'Enabled',
                        'total_amount' => $amount
                    ]);
                }
            }

            //var_dump($total);
           // var_dump($totalresult);

            $message = 'Successfully Deposited an Amount of ' . $amount . ' with Transaction Id: ' . $transactionId;
            session()->flash('success', $message);
            return redirect()->back()->with('success', $message);
            session()->forget('contact');
            curl_close($curl);
        }
        
    }
        }
        
    
}

    

            public function getTotalPerDay(Request $request){
                $time = date('H:i:s');
            
                $totals = DB::table('deposit_tb')
                    ->select('contact', 'username', 'date_deposited', DB::raw('SUM(amount) as total_amount'))
                    ->where('Status', 'Success')
                    ->groupBy('contact', 'username', 'date_deposited')
                    ->orderBy('date_deposited', 'asc')
                    ->get();
                    
                return view('total', ['totals' => $totals]);
            
                if($request->has('insertButton')){
                // Insert the totals into the 'totals_tb' table if they don't already exist
                foreach ($totals as $total) {
                    $exists = DB::table('totals_tb')
                        ->where('date_deposited', $total->date_deposited)
                        ->where('contact', $total->contact)
                        ->where('username', $total->username)
                        ->where('total_amount', $total->total_amount)
                        ->exists();
            
                    if (!$exists) {
                        DB::table('totals_tb')->insert([
                            'date_deposited' => $total->date_deposited,
                            'total_amount' => $total->total_amount,
                            'contact' => $total->contact,
                            'username' => $total->username,
                            'time' => $time,
                        ]);
                        }
                    }
                }
    
    }










}