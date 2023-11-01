<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;

class MyHomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    
    public function index() {

        return view('Myhome', '');
    }
    
        public function dashboard() {

        return view('Myhome', '');
    }



}
