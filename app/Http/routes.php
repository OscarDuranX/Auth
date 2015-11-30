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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/resource', ['as' => 'patata',  function(){
            return view('resource');
        }]
    );

    Route::get('/resource', ['as' => 'resource',  function(){
            return view('resource');
        }]
    );

    Route::get('/home',
        [
            'as' => 'auth.home',
            function () { return view('home'); }
        ]);
    Route::get('/phpinfo',
            function () { return phpinfo(); }
        );


});






Route::get(/**
 * @return \Illuminate\View\View
 */
    '/', function () {
    return view('welcome');
});



//Route::get('/login',
//    [
//        'as' => 'auth.login' ,
//        'uses' => 'LoginController@getLogin'
//    ]);

//Route::post('/postLogin',[
//    'as' => 'auth.postLogin' ,
//    'uses' => 'LoginController@postLogin']);

Session::get('authenticate');

Route::get('/forceLogout', function(){

   Session::flush();
});



Route::get('/register',['as' => 'auth.register' ,
        'uses' => 'RegisterController@getRegister'
]);

Route::post('/register',['as' => 'auth.postRegister' ,
    'uses' => 'RegisterController@postRegister'
]);

Route::post('/checkEmailExists',['as' => 'auth.checkEmailExists' ,
    'uses' => 'ApiController@checkEmailExists'
]);

