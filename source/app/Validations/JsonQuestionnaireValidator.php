<?php
namespace App\Validations;

use Illuminate\Validation\Validator as IlluminateValidator;
/**
 * Adds validations for the questionnaires in json format
 */
class JsonQuestionnaireValidator extends IlluminateValidator
{

    const NO_QUESTIONS_ERROR            = "Debe agregar al menos una pregunta";
    const INVALID_QUESTION              = "Todas las preguntas deben tener una descripción y un tipo";
    const NO_TITLE_ERROR                = "El cuestionario debe tener un titulo y una descripción";
    const ZERO_OPTIONS_ERROR            = "Cada respuesta debe tener al menos una opción";
    const OPTION_DESCRIPTION_ERROR      = "Cada opción debe tener una descripción";
    const MORE_THAN_ONE_CORRECT_ANSWER  = "Cada pregunta solo puede tener una opción correcta";

    private $_custom_messages = array(
        "questionnaire_json" => "");

    /**
     * Adds an error to the stack
     */
    private function addErrorMessage($message)
    {
        $this->customMessages["questionnaire_json"] = $this->customMessages["questionnaire_json"] . "\n-" . $message;
    }

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
        $questionnaire = json_decode($value); //Turn it into an stdClass
        //validates the title and the description
        $hasTitleAndDescription = $this->validateTitleAndDescription($questionnaire);
        //validates the questions
        $hasValidQuestions      = $this->validateQuestions($questionnaire);

        return $hasTitleAndDescription && $hasValidQuestions;
    }


    protected function validateTitleAndDescription($questionnaire)
    {
        $isValid = $this->validateRequiredField($questionnaire,'title') && $this->validateRequiredField($questionnaire,'description');
        if(!$isValid)
        {
            $this->addErrorMessage(self::NO_TITLE_ERROR);
        }
        return $isValid;
    }

    protected function validateQuestions($questionnaire)
    {
        $isValid = TRUE;
        $hasQuestions = $this->validateRequiredField($questionnaire, 'questions');
        if(!$hasQuestions)
        {
            $isValid = FALSE;
            $this->addErrorMessage(self::NO_QUESTIONS_ERROR);
        }
        else
        {
            foreach ($questionnaire->questions as $key => $question)
            {
                $validQuestion =$this->validateQuestion($question);
                if(!$validQuestion)
                {
                    $isValid = FALSE;
                }
            }
        }

        return $isValid;
    }

    protected function validateQuestion($question)
    {
        $validTitle       = $this->validateRequiredField($question,'title');
        $validType      = TRUE; //TODO
        if(!$validTitle || !$validType) $this->addErrorMessage(self::INVALID_QUESTION);
        $validOptions   = $this->validateMultipleChoiceOptions($question->options);
        return $validTitle && $validType && $validOptions;
    }

    protected function validateMultipleChoiceOptions($arrayOfOptions)
    {
        $isValid = TRUE;
        $isEmpty = empty($arrayOfOptions);
        if($isEmpty)
        {
            $isValid = FALSE;
            $this->addErrorMessage(self::ZERO_OPTIONS_ERROR);
        }
        $correctAnswersCount = 0;
        foreach ($arrayOfOptions as $key => $option)
        {
            //checks the existance of the properties description and isCorrect
            $hasDescription = $this->validateRequiredField($option, 'description');
            $hasPropertyIsCorrect = isset($option->isCorrect);

            if(!$hasDescription || !$hasPropertyIsCorrect)
            {
                $isValid = FALSE;
                $this->addErrorMessage(self::OPTION_DESCRIPTION_ERROR);
            }
            else
            {
                if($option->isCorrect){
                    $correctAnswersCount = $correctAnswersCount + 1;
                }
            }

        }
        if($correctAnswersCount > 1) //only one option can be flagged as correct
        {
            $isValid = FALSE;
            $this->addErrorMessage(self::MORE_THAN_ONE_CORRECT_ANSWER);
        }

        return $isValid;
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
