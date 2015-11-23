<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Hash;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


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

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

//        if($this->login($request->email, $request->password)){
//            //REDIRECT TO HOME
//            //Session::set('authenticated',true);
//
//            return redirect()->route('auth.home');
//        }else{
//            $request->session()->flash('login_error', 'Login Incorrecte');
//            return redirect()->route('auth.login');
//            //REDIRECT BACK
//        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->route('auth.home');
            //return redirect()->intended('auth.home');
        }else{
            return redirect()->route('auth.login');
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
//    public function login($email,$password)
//    {
////        $user = User::findOrFail(id);
////          //$user = User::all();
//
//        $user = User::where('email',$email)->first();
//
//        /*if($user->password == bcrypt($password)){
//            return true;
//        } else{
//            return false;
//        }*/
//        if($user) {
//
//            if (Hash::check($password, $user->password)) {
//                return true;
//            } else {
//                return false;
//            }
//        }
//        else {
//            return false;
//        }
//
//    }
}
