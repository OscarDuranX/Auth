<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;


/**
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{
    /**
     * Process a login HTTP POST
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {
        //TODO
        // dd($request->all());
        //\Debugbar::info("Entra postlogin");
        //echo "prova";

        if($this->login($request->email, $request->password)){
            //REDIRECT TO HOME
            return redirect()->route('auth.home');
        }else{
            return redirect()->route('auth.login');
            //REDIRECT BACK
        }
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getLogin(){
        return view('login');
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public function login($email,$password)
    {
        return true;
    }
}
