<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use DB;
use Auth;
use Illuminate\Http\Request;


class HomeController extends Controller {

    public function index() {
//        $userId = Auth::id();
        $data['result'] = DB::table('tbl_pages')->where('id', 6)->get();
//        $data['resultdate'] = DB::table('user_sched');
        return view('home', $data);
    }




  public function register(Request $request) {
    $firstname = $request->input('firstname');
    $lastname = $request->input('lastname');
    $email = $request->input('email');
    $username = $request->input('username');
    $password = $request->input('password');
    $contactnumber = $request->input('contactnumber');
    $address = $request->input('address');
    $inputref = $request->input('referal');
        
    $level = "";    
    if($inputref == false){
        $inputref = "0";
        $level = 1;
    }
        
        
    $emailExists = DB::table('cms_users')
        ->where('email', $email)
        ->exists();
    
  
    $contactExists = DB::table('cms_users')
        ->where('contact', $contactnumber)
        ->exists();

    if ($emailExists) {
         return response()->json(['message' => 'emailexist']);
    } 
    
    if($contactExists){
         return response()->json(['message' => 'contactexist']);

    }
    else{
        $referal = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);
        $userId = DB::table('cms_users')->insertGetId([
            'name' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => bcrypt($password), 
            'contact' => $contactnumber,
            'address' => $address,
            'id_cms_privileges' => 3,
            'my_referal' => $referal,
            'input_referal' =>$inputref,
            'multi_level' =>$level,
        
        ]);
    
        if ($userId) {
            if($inputref == true){
            $level++;
            $userref = DB::table('cms_users')->where('my_referal', $inputref)->first();
            $user_id_invitedby = $userref->id;    
            $user_level = $userref->multi_level;    
            
            $sqlins = DB::table('yazzea_multilevel')->insertGetId([
            'yaz_userid' => $userId,
            'yaz_userid_invitedby' => $user_id_invitedby,
            'rewards_credit' => 500,
            'yaz_level' => $level, 
            'yaz_input_referal' =>$inputref,
         
          ]);
            
            if($sqlins){
                 return response()->json(['message' => 'success']);
            }
          }
          
       else{
           return response()->json(['message' => 'success']);
           
       }
            
            

        } else {
           
            return response()->json(['message' => 'failed']);
        }
    }
    
}






     public function insertReference(Request $request){
         $userId = $request->input('users_id');
         $fileName = $request->file('img')->getClientOriginalName();

       
        $path = $request->file('img')->storeAs('upload', $fileName);
        
       
    
         $userId = DB::table('cms_users')
                ->where('id',  $userId)
                ->update(['image_reference' =>$path]);
                
                
        if ($userId) {
                return redirect()->back()->with('error', 'User ID is required.');
        } else {
           
              return redirect()->back()->with('error', 'User ID is required.');
        }
        
        
        
        
           
     }
       
        
        
   
    
    
   
  
  
  
 
  






    

}
