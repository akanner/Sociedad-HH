<?php

namespace App\Http\Controllers;

class StaticPagesController extends Controller {

    /*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

    public function home() {
        return view('pages.home');
    }

    public function contacto() {
        return view('pages.contacto');
    }

}
