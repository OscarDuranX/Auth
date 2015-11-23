<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/carrot','CarrotController@getCarrot');


Route::get(/**
 * @return \Illuminate\View\View
 */
    '/', function () {
    return view('welcome');
});

Route::get('/home',
    [
        'as' => 'auth.home',
        function () { return view('home'); }
    ]);

Route::get('/login',
    [
        'as' => 'auth.login' ,
        'uses' => 'LoginController@getLogin'
    ]);

Route::post('/postLogin',[
    'as' => 'auth.postLogin' ,
    'uses' => 'LoginController@postLogin']);

Session::get('authenticate');

Route::get('/forceLogout', function(){

   Session::flush();
});



Route::get('/resource', function (){

    $authenticated= false;
    //dd(Session::all());
    //Session::set('authenticated', false);
    // \Debugbar::starMeasure("pepito1");
   // \Debugbar::info("Xivato 1!!");
  //  \Debugbar::info(Session::all());
//    if(Session::has('authenticated')) {
//        if(Session::get('authenticated') ==true){
//            $authenticated = true;
//        }
//}
//
//
//    if($authenticated){
//       // \Debugbar::stopMeasure("pepito1");
//        return view('resource');
//    }else{
//        return redirect()->route('auth.login');
//    }

    if(Auth::check()){
        return view('resource');
    }else{
        return redirect()->route('auth.login');
    }
});

Route::get('/register',['as' => 'auth.register' ,
        'uses' => 'RegisterController@getRegister'
]);

Route::post('/register',['as' => 'auth.postRegister' ,
    'uses' => 'RegisterController@postRegister'
]);

