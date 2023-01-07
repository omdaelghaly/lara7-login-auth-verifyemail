<?php

use App\Http\Controllers\Auth\Authcontroller;
use App\Http\Controllers\Home\Homecontroller;
use Illuminate\Routing\RouteGroup;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['namespace' =>'Auth'] ,function(){

Route::get('/register','Registercontroller@registerpage')->name('register');
Route::post('/newregister','Registercontroller@newregister')->name('newregister');
Route::post('/realtimevalidateregister','Registercontroller@realtimevalidateregister')->name('realtimevalidateregister');

Route::get('/login', 'Logincontroller@loginpage')->name('login');
Route::post('/newlogin', 'Logincontroller@newlogin')->name('newlogin');
Route::post('/realtimevalidatelogin', 'Logincontroller@realtimevalidatelogin')->name('realtimevalidatelogin');

Route::get('/forgetpwd','Forgetpwdcontroller@forgetpwdpage')->name('forgetpwd');
Route::post('/sendemailforgetpwd','Forgetpwdcontroller@sendemailforgetpwd')->name('sendemailforgetpwd');
Route::get('/callback_pwd/e/{email}/t/{token}','Forgetpwdcontroller@callback_pwd')->name('callback_pwd');
Route::get('/changepwd','Forgetpwdcontroller@changepwdpage')->name('changepwdpage');
Route::post('/savenewpassword','Forgetpwdcontroller@savenewpassword')->name('savenewpassword');


});
//middleware auth
Route::group(['middleware' => ['auth'] ] , function(){
    Route::get('/sendemailverify','Auth\Verifyusercontroller@sendemailverify')->name('verifyemailpage');
    Route::get('/callback_ve/e/{email}/t/{token}','Auth\Verifyusercontroller@callback_ve')->name('callback_ve');

});

//midleware auth / midleware verifyemail
Route::group(['middleware' => ['auth','verifyemail'] ] , function(){

Route::get('/logout','Auth\Logincontroller@logout')->name('logout');
Route::get('/','Home\Homecontroller@home')->name('home');

});

