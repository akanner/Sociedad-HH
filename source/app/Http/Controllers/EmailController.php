<?php

namespace App\Http\Controllers;

use Mail;
use App\Http\Requests\SendEmailRequest;

// http://laravel.com/docs/5.1/requests
// https://mailtrap.io

class EmailController extends Controller {

    const REQUEST_PARAM_FULLNAME = "fullName";
    const REQUEST_PARAM_EMAIL = "email";
    const REQUEST_PARAM_SUBJECT = "subject";
    const REQUEST_PARAM_MESSAGE = "message";

    public function sendEmail(SendEmailRequest $request) {
        $fullName = $request->input(self::REQUEST_PARAM_FULLNAME);
        $email = $request->input(self::REQUEST_PARAM_EMAIL);
        $subject = $request->input(self::REQUEST_PARAM_SUBJECT);
        $userMessage = $request->input(self::REQUEST_PARAM_MESSAGE);

        Mail::send("emails.prueba", ["userMessage" => $userMessage], function ($message) use ($email, $fullName, $subject) {
            $message->from($email, $fullName)
                    ->to("leito.vm3@hotmail.com")
                    ->subject($subject);
        });

        return view("confirmations.confirmationMessage", [
            "message" => "¡Gracias por comunicarse!",
            "linkTo" => "/home",
            "linkLabel" => "Volver al home"
        ]);
    }

}
