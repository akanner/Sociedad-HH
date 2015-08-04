<?php
namespace App\Validations;
use Illuminate\Support\ServiceProvider;

class JsonQuestionnaireServiceProvider extends ServiceProvider {

    public function register() {}

    public function boot() {
        $this->app->validator->resolver( function( $translator, $data, $rules, $messages = array(), $customAttributes = array() ) {
            return new JsonQuestionnaireValidator( $translator, $data, $rules, $messages, $customAttributes );
        } );
    }

}   //end of class
