<?php

namespace App\Http\Controllers;

use App\Utils\MailHelper;
use App\Http\Requests\SendEmailRequest;

// http://laravel.com/docs/5.1/requests
// https://mailtrap.io

class ContactController extends Controller {

    const REQUEST_PARAM_FULLNAME = "fullName";
    const REQUEST_PARAM_EMAIL = "email";
    const REQUEST_PARAM_SUBJECT = "subject";
    const REQUEST_PARAM_MESSAGE = "message";

    public function sendEmail(SendEmailRequest $request) {
        $fullName = $request->input(self::REQUEST_PARAM_FULLNAME);
        $email = $request->input(self::REQUEST_PARAM_EMAIL);
        $subject = $request->input(self::REQUEST_PARAM_SUBJECT);
        $userMessage = $request->input(self::REQUEST_PARAM_MESSAGE);

        $mailHelper = MailHelper::getInstance();
        $mailHelper->queueMail(
            $email,
            $mailHelper->getMyEmailAddress(),
            $fullName,
            $subject,
            "emails",
            ["userMessage" => $userMessage],
            null,
            null
        );

        return view("confirmations.confirmationMessage", [
            "header" => "Sociedad de Hematólogos y Hemoterapeutas de La Plata",
            "title" => "¡Gracias por contactarnos!",
            "message" => "Nos comunicaremos con usted",
            "linkTo" => "/home",
            "linkLabel" => "Volver al home"
        ]);
    }

}
