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
     *
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    protected function validateQuestionnaireJson( $attribute, $value )
    {
        $questionnaire = json_decode(json_encode($value)); //Turn it into an stdClass
        //validates the title and the description
        $hasTitleAndDescription = $this->validateTitleAndDescription($questionnaire);
        //validates the questions
        $hasValidQuestions      = $this->validateQuestions($questionnaire);

        return $hasTitleAndDescription && $hasValidQuestions;
    }


    protected function validateTitleAndDescription($questionnaire)
    {
        return $this->validateRequiredField($questionnaire,'title') && $this->validateRequiredField($questionnaire,'description');
    }

    protected function validateQuestions($questionnaire)
    {
        $hasQuestions = $this->validateRequiredField($questionnaire, 'questions');
        if(!$hasQuestions)
        {
            return FALSE;
        }
        else
        {
            foreach ($questionnaire->questions as $key => $question)
            {
                $validQuestion =$this->validateQuestion($question);
                if(!$validQuestion)
                {
                    return FALSE;
                }
            }
        }

        return TRUE;
    }

    protected function validateQuestion($question)
    {
        $validTitle     = $this->validateRequiredField($question,'title');
        $validType      = TRUE; //TODO
        $validOptions   = $this->validateMultipleChoiceOptions($question->options);
        return $validTitle && $validType && $validOptions;
    }

    protected function validateMultipleChoiceOptions($arrayOfOptions)
    {
        $isEmpty = empty($arrayOfOptions);
        if($isEmpty)
        {
            return FALSE;
        }
        $correctAnswersCount = 0;
        foreach ($arrayOfOptions as $key => $option)
        {
            //checks the existance of the properties description and isCorrect
            $hasDescription = $this->validateRequiredField($option, 'description');
            $hasPropertyIsCorrect = isset($option->isCorrect);

            if(!$hasDescription || !$hasPropertyIsCorrect)
            {
                return FALSE;
            }
            else
            {
                if($option->isCorrect == "true"){
                    $correctAnswersCount = $correctAnswersCount + 1;
                }
            }

        }
        return $correctAnswersCount == 1; //only one option can be flagged as correct
    }


    protected function validateRequiredField($object,$field)
    {
        $isset = isset($object->$field);
        if($isset)
        {
            return !empty($object->$field);
        }
        else
        {
            return FALSE;
        }
    }

}
