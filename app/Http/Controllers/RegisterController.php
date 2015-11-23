<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;


class RegisterController extends Controller
{
    protected $name;
    protected $email;

    public function getRegister()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {

       //dd(Input::all());

        //dd($request->get('name'));

        $this->validate($request, [
            'name' => 'required|max:100',
            'email' =>
                'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->name = $request->get('name');
        $user->password = bcrypt(
            $request->get('password'));
        $user->email = $request->get('email');


        $user->save();

        $this->name = $request->get('name');
        $this->email = $request->get('email');

        $this->sendRegisterEmail();

        return redirect()->route('auth.login');

        //User::create(Input::all());



    }

    public function sendRegisterEmail()
    {

        $emailData = new \stdClass();
        $emailData->email = $this->email;
        $emailData->name = $this->name;
        $emailData->subject = "Welcome user " . $this->name;
        $emailData->footer = "footer here";
        $emailData->head = "head here";

        //guarda el valor de los campos enviados desde el form en un array

        $data['text']= 'Prova de envio correu';
        //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
        \Mail::send('emails.message', $data, function($message) use ($emailData)
        {
            //remitente
            $message->from($emailData->email, $emailData->name);

            //asunto
            $message->subject($emailData->subject);

            //receptor
            $message->to(env('CONTACT_MAIL'), env('CONTACT_NAME'));

        });
        return \View::make('success');
    }
}
