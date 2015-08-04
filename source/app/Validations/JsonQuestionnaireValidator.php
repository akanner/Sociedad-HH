<?php
namespace App\Validations;

use Illuminate\Validation\Validator as IlluminateValidator;
/**
 * Adds validations for the questionnaires in json format
 */
class JsonQuestionnaireValidator extends IlluminateValidator
{

    private $_custom_messages = array(
        "alpha_dash_spaces" => "The :attribute may only contain letters, spaces, and dashes.",
        "alpha_num_spaces" => "The :attribute may only contain letters, numbers, and spaces.",
    );

    public function __construct( $translator, $data, $rules, $messages = array(), $customAttributes = array() )
    {
       parent::__construct( $translator, $data, $rules, $messages, $customAttributes );
       $this->_set_custom_stuff();
    }

    /**
    * Setup any customizations etc
    *
    * @return void
    */
   protected function _set_custom_stuff()
   {
       //setup our custom error messages
       $this->setCustomMessages( $this->_custom_messages );
   }

   /**
     * Allow only alphabets, spaces and dashes (hyphens and underscores)
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    protected function validateJsonQuestionnaire( $attribute, $value )
    {
        return TRUE;
    }

}
