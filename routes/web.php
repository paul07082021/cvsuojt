<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});



use App\Http\Controllers\DepositSlipController;
use Illuminate\Support\Facades\Route;


//Route::get('/test','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/filedate', 'HomeController@filedate');
//Route::get('/', 'MainController@index');

$datas = DB::table('tbl_pages')->select('page_title')->where('page_status_id', 2)->get();
$siteNum = count($datas);
//echo $siteNum;
//var_dump($datas);

foreach ($datas as $data)
{   
  
    
    //echo $data->page_title;
    Route::get('/'.$data->page_title, 'MainController@index');
   
}
    
//Route::get('/', 'MainController@main_page');
Route::get('/', function () {
    return view('maintenance');
});



Route::get('register', function () {
    return view('registration');
});

Route::post('signup', 'HomeController@register')->name('register');
Route::post('referenceinsert', 'HomeController@insertReference')->name('reference');

Route::get('view-image', 'AdminYazzeaUsersActivationController@viewImage');
