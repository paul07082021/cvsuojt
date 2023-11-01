<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\payment;

class MainController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct() {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
//    public function index() {
//        $userId = Auth::id();
//        $data['result'] = DB::table('users')->where('id', $userId)->get();
//        $data['resultdate'] = DB::table('user_sched');
//        return view('home', $data);
//    }
    
    public function index() {
//        $userId = Auth::id();
        //echo basename( $_SERVER["REQUEST_URI"]);
        
        $data['result'] = DB::table('tbl_pages')->where('page_title', basename( $_SERVER["REQUEST_URI"]))->get();
        $data['result_header'] = DB::table('tbl_header')->where('header_status', 2)->get();
        $data['result_footer'] = DB::table('tbl_footer')->where('footer_status_id', 2)->get();
//        $data['resultdate'] = DB::table('user_sched');
        return view('main', $data);
    }
    
      public function main_page() {
//        $userId = Auth::id();
        //echo basename( $_SERVER["REQUEST_URI"]);
        $page_id = DB::table('tbl_page_settings')->select('page_id')->where('id', 1)->first();
        //echo $page_id->page_id;
        $data['result'] = DB::table('tbl_pages')->where('id', $page_id->page_id)->get();
        $data['result_header'] = DB::table('tbl_header')->where('header_status', 2)->get();
        $data['result_footer'] = DB::table('tbl_footer')->where('footer_status_id', 2)->get();
//        $data['resultdate'] = DB::table('user_sched');
        return view('main', $data);
    }  
  
    

//    public function filedate(Request $request) {
//        $post_title = $request->input('title');
//        $post_date = $request->input('datesched');
//        $userId = Auth::id();
//        DB::table('user_sched')->insert(
//                ['title' => $post_title, 'date' => $post_date, 'users' => $userId]
//        );
//        return view('thankyou');
//    }

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
   
   public function exportcsv(Request $request) {
	$currentMonth = Carbon::now()->format('m'); 
    $data = DB::table('apk_logs')->whereRaw("MONTH(date_send) = $currentMonth")->get();
    $headers = ['ID', 'sender', 'agent number', 'Username', 'Message','Api status', 'referenceid', 'phone number', 'amount','date'];

    $output_buffer = fopen('php://temp', 'w+');
    fputcsv($output_buffer, $headers);

    foreach ($data as $row) {
        fputcsv($output_buffer, (array) $row);
    }

  
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="export.csv"');
    rewind($output_buffer);
    fpassthru($output_buffer);
    fclose($output_buffer);

    exit;
}
   



   
}
