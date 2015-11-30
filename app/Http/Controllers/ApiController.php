<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class ApiController extends Controller
{

    public function checkEmailExists(Request $request)
    {
        //$email = Input::get('email');
        $email = $request->get('email');
        //\Debugbar::info("comprova email" . $email);

        if($this->checkEmail($email)){
            return "true";
        }else{
            return "false";
        }
        return "comprova email " . $email;
    }

    private function checkEmail($email)
    {
        $user = User::Where('email',$email)->first();
        if($user == null){
            return true;
        }
        return false;
    }

}
