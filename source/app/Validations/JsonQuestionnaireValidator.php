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
        $hasTitleAndDescription = $this->validateTitleAndDescription($questionnaire);
        $hasValidQuestions      = $this->validateQuestions($questionnaire);


        //die(var_dump($hasValidQuestions));
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
        return TRUE;
    }

    protected function validateMultipleChoiceOptions($arrayOfOptions)
    {
        $isNotEmpty = empty($arrayOfOptions);
        if(!$isNotEmpty)
        {
            return FALSE;
        }
        $correctAnswersCount = 0;
        foreach ($arrayOfOptions as $key => $option)
        {
            $hasDescription = $this->validateRequiredField($option, 'description');
            $hasPropertyIsCorrect = isset($option->isCorrect);
            if(!$hasDescription || !$hasPropertyIsCorrect)
            {
                return FALSE;
            }
            else
            {
                if($option->isCorrect) $correctAnswersCount++;
            }

        }

        return $correctAnswersCount == 1;
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
