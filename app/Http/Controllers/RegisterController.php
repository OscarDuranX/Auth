<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;


class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {

       //dd(Input::all());

        $this->validate($request, [
                'name' => 'required|max:40',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed'
        ]);

        $user = new User();

        $user->name = $request->get('name');
        $user->password = bcrypt($request->get('password'));
        $user->email = $request->get('email');
        $user->username = $request->get('user');

        $user->save();

        //return redirect()->route('auth.login');

        //User::create(Input::all());



    }
}
