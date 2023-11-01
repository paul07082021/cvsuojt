<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;

class MyApiController extends Controller
{
    //

    public function connect(Request $request){
        $header = $request->header('Authorization');
         if(empty($header)){
         return response()->json(
           $data = [
               'status' => 404,
               'message' => 'Authentication Key is Missing'
           ], 200);
     }
     else{
           if($header == "Bearer 123456"){
            return response()->json(
           $data = [
               'status' => 200,
               'message' => 'Connected in API'
           ], 200);
           }
           else{
           return response()->json(
           $data = [
               'status' => 404,
               'message' => 'Failed To Connect'
           ], 200);
           }
     }
   } 


   public function insertlogs(Request $request){
   
    $header = $request->header('Authorization');
    if(empty($header)){
        return response()->json(
            $data = [
                'status' => 404,
                'message' => 'Authentication Key is Missing'
            ], 200);
    }
    else{
        if($header == "Bearer 123456"){
            $key = request('key');
            $amount = request('amount');
            $contactNumber = request('cellnum');
            $username = request('username');
            $email = request('email');
            $merchantid = request('merchantId');
            $transactionId = request('transactionId');
            
            
            $json_object = array(
                'username' => $username,
                'amount' => $amount,
                'cellnum' => $contactNumber,
                'email' => $email,
                'merchantId' => $merchantid,
                'transactionId' => $transactionId,
                'key' => $key 
            );
            
            
            // Convert JSON object to URL query string parameter
            $query_string = http_build_query($json_object);
            
         
            return("Location: https://knowza.asia/pay/index.php?$query_string");
            
        }
        else{
            return response()->json(
                $data = [
                    'status' => 404,
                    'message' => 'Authentication Key is Invalid'
                ], 200);
        }
    }

}


public function apiconnect(Request $request){

    $ip_address = $request->ip();
    $key = $request->input('key');
    $amount = $request->input('amount');
    $contactNumber = $request->input('cellnum');
    $username = $request->input('username');
    $email = $request->input('email');
    $merchantid = $request->input('merchantId');
    $transactionId = $request->input('transactionId');

    $header = $request->header('Authorization');
    if(empty($header)){
        return response()->json(
            $data = [
                'status' => 404,
                'message' => 'Authentication Key is Missing'
            ], 200);
    }
    else{
        if($header == "Bearer 123456"){
            if($amount == false && $contactNumber == false && $username == false && $email== false){
                return response()->json(
                    $data = [
                        'status' => 404,
                        'message' => 'Parameters is incorrect'
                    ], 200);
            }
            else{

          
            $recentid = DB::table('api_logs')->insert([
                'status' => '200',
                'ipaddress' => $ip_address,
                'amount' => $contactNumber,
                'contact' => $amount,
                'username' =>  $username,
                'email' => $email,
                'transactionid' => '123Sample'
            ]);
            
            $json_object = array(
                'username' => $username,
                'amount' => $amount,
                'cellnum' => $contactNumber,
                'email' => $email,
                'merchantId' => $merchantid,
                'transactionId' => $transactionId,
                'key' => $key
            );

            $query_string = http_build_query($json_object);

            if($recentid == true){
             $redirect_url = "https://knowza.asia/pay/index.php?$query_string";
                return Redirect::to($redirect_url);
            
            }
            else
            {
                return response()->json(
                    $data = [
                        'status' => 200,
                        'message' => 'Insert failed'
                    ], 200);
            }

        }
    }

        else{
            return response()->json(
                $data = [
                    'status' => 404,
                    'message' => 'Authentication Key is Invalid'
                ], 200);
        }


 }


}


    public function licenseKey(Request $request) {
        $agentNumber = $request->input('agentNumber');
        $token = $request->input('token');
        $username = $request->input('username');
        $licensekey = $request->input('licensekey');
        
        $updatelicense = DB::table('gp_users')
            ->where('username', $username)
            ->where('contact', $agentNumber)
            ->update(['license_key' => $licensekey]);
    
        $checklicensekey = DB::table('gp_users')
            ->select('id', 'license_key')
            ->where('license_key', '=', $licensekey)
            ->get();
            
        //$checkAgentAuth = DB::table('agent_auth')    
       //     ->where('')
       var_dump($checklicensekey);
        if ($checklicensekey) {
            $updatestatus = DB::table('agent_auth')
                ->where('auth_key', '=', $checklicensekey->license_key)
                ->update([
                    'agentId' => $checklicensekey->id,
                    'status' => 'Used'
                ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Invalid Credentials'
            ], 404);
        }
    }



    //To filter the agent records
    public function filter(Request $request){
        
        
              $apitoken_endpoint = "https://gphost.cloud/api/token-authentication";
      $tokenData = [
                    'userName' =>  "mobileauthentication@spadmond.com",
                    'password' => "yrAIESGt;E5_~#+oct:#iX,~=0'MQ/U0"
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
                  
                  
                // Check for cURL errors
                if ($httpStatus === 401) {
                    $error = curl_error($curlToken);
                    echo "cURL error: " . $error;
                }
                else{
                    
             
    
        $agentNumber = $request->input('agentNumber');
        $token = $request->input('token');
        $username = $request->input('username');
        //$message = $request->input('message');
        $sender = $request->input('sender');
        $message = strval($request->input('message'));
        
        
        
    
         $sqltry = DB::table('catch_number')->insert([
            'number_get' =>  $agentNumber,
        ]);
        
        
        


        if($sender == "3737"){
        //query here to filter the agent record
        $users = DB::table('gp_users')
        ->where('key', $token)
        ->where('contact', $agentNumber)
        ->where('username', $username)
        ->get();
        
        if($users->count()){
           
            //api invitational link here
               
        //$message = "You have received PHP 200.00 of GCash from JOS IS*H M. 09356755567 w/ MSG: . Your new balance is PHP 447.74. Ref. No. 8012262033422.";

             
       /* $message = "Trx ID 15072938169. You have Received 500.00 from JAKE JAKE with Easypaisa Account 923493605343 and your new Easypaisa account balance is RS. 100000.00";*/
       $trxIdPattern = '/Trx ID (\d+)/';
        $amountPattern = '/Rs ([\d.]+)/';
        $accountNumberPattern = '/Account (\d+)/';
        
        
        /*$trxIdPattern = '/Ref. No. (\d+)/';
        $amountPattern = '/PHP ([\d.]+)/';
        $accountNumberPattern = '/B. (\d+)/';*/
        
        // Extracting the transaction ID
        preg_match($trxIdPattern,  $message, $trxIdMatches);
        $trxId = $trxIdMatches[1];
        
        // Extracting the amount
        preg_match($amountPattern,  $message, $amountMatches);
        $amount = $amountMatches[1];
        
        // Extracting the account number
        preg_match($accountNumberPattern,  $message, $accountNumberMatches);
        $accountNumber = $accountNumberMatches[1];
    




                $api_endpoint = "https://gphost.cloud/api/mobile-deposit";
                $formattedAmount = number_format($amount, 2, '.', '');
                
                // Prepare the POST data
                 $postData = [
                    'referenceId' => $trxId ,
                    'phoneNumber' =>   $agentNumber,
                    'amount' =>  $amount,
                ];
                
                // Convert the data to JSON
                $jsonData = json_encode($postData);
                
                // Set the cURL options
                $curl = curl_init($api_endpoint);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($jsonData),
                      'Authorization: Bearer ' . $responsetoken, 
                ]);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
                
                // Send the POST request
                $response = curl_exec($curl);
                
                // Check for cURL errors
                if ($response === false) {
                    $error = curl_error($curl);
                    echo "cURL error: " . $error;
                }
                
                // Close cURL
                curl_close($curl);
                
                // Do something with the response
                echo $response;

            $recentid = DB::table('apk_logs')->insert([
                'agentNumber' =>  $agentNumber,
                'Username' => $username,
                'Message' => $message,
                'Api_status' => $jsonData,
                'sender' => $sender,
                'referenceId' => $trxId, 
                'phoneNumber' => $agentNumber,
                'amount' => $amount,
                
            ]);
            
            
            
        }
        else{
            return response()->json(
                $data = [
                    'status' => 200,
                    'message' => 'Invalid Credentials'
                ], 200);
        }
                }
                
              }

       }


       function easypaisa(Request $request){

        $transactionid = $request->input('data_transactionId');
        $amount = $request->input('data_amount');
        $mobile = $request->input('data_mobilenum');
        $referenceId = $request->input('referenceId');
        $img = $request->input('img');

        if($transactionid == false && $amount ==false && $mobile == false && $referenceId == false){
            return response()->json(
                $data = [
                    'status' => 400,
                    'message' => 'incorrect params'
                ], 200);
          }
      else{

        $ins = DB::table('easypaisa_logs')->insert([
            'transactionId' =>  $transactionid,
            'amount' => $amount,
            'mobileNumber' => $mobile,
            'referenceId' => $referenceId,
        ]);
                
        if($ins !== true){
            return response()->json(
                $data = [
                    'status' => 400,
                    'message' => 'failed to insert'
                ], 200);
        }
        else{
            return response()->json(
                $data = [
                    'status' => 200,
                    'message' => 'success'
                ], 200);
        }
       }

    }

 }






