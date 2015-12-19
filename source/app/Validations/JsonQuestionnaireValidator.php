<?php
namespace App\Validations;

use Illuminate\Validation\Validator as IlluminateValidator;
/**
 * Adds validations for the questionnaires in json format
 *
 * NEEDS REFACTORING!!!!!!!!!!!!!!!!!!!!!!!!!!!
 */
class JsonQuestionnaireValidator extends IlluminateValidator
{

    const NO_QUESTIONS_ERROR            = "Debe agregar al menos una pregunta";
    const INVALID_QUESTION              = "Todas las preguntas deben tener una descripción y un tipo";
    const NO_TITLE_ERROR                = "El cuestionario debe tener un encabezado, un título y una descripción";
    const ZERO_OPTIONS_ERROR            = "Cada respuesta debe tener al menos una opción";
    const ZERO_SUBQUESTION_ERROR        = "Las preguntas tipo tabla deben tener al menos una sub pregunta o sub categoria";
    const ZERO_SUBQUESTION_OPTIONS_ERROR= "Cada sub pregunta debe tener al menos una opcion";
    const EMPTY_OPTION_DESCRIPTION      = "Las opciones eben tener una descripcion";
    const OPTION_DESCRIPTION_ERROR      = "Cada opción debe tener una descripción";
    const MORE_THAN_ONE_CORRECT_ANSWER  = "Cada pregunta solo puede tener una opción correcta";
    const INVALID_SUBQUESTION           = "Cada sub-pregunta debe tener una descripcion y al menos una opción";

    const MULTIPLE_CHOICE_QUESTION_SINGLE_OPTION = "MultipleChoiceQuestionSingleOption";
    const MULTIPLE_SELECTION_QUESTION = "MultipleSelectionQuestion";

    private $_custom_messages = array("questionnaire_json" => "");

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
        $isValid =  BasicValidations::getInstance()->validateRequiredField($questionnaire,'title') &&
                    BasicValidations::getInstance()->validateRequiredField($questionnaire,'description') &&
                    BasicValidations::getInstance()->validateRequiredField($questionnaire,'heading');

        if(!$isValid)
        {
            $this->addErrorMessage(self::NO_TITLE_ERROR);
        }

        return $isValid;
    }

    protected function validateQuestions($questionnaire)
    {
        $isValid = TRUE;
        $hasQuestions = BasicValidations::getInstance()->validateRequiredField($questionnaire, 'questions');
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

    /*QUESTION VALIDATORS*/

    protected function validateQuestion($question)
    {
        switch ($question->type) {
            case self::MULTIPLE_CHOICE_QUESTION_SINGLE_OPTION:
                return $this->validateMultipleChoiceQuestion($question);
            case self::MULTIPLE_SELECTION_QUESTION:
                return $this->validateMultipleSelectionQuestion($question);
            default:
                throw new Exception("the type $questionType is not a valid question type");
        }
    }


    protected function validateMultipleSelectionQuestion($question)
    {
        $validGeneralData = $this->validateGeneralQuestion($question);
        $validSubquestions = $this->validateMultipleSelectionSubquestions($question->subquestions);

        return $validGeneralData && $validSubquestions;
    }

    protected function validateMultipleSelectionSubquestions($subquestions)
    {
        //validates if the question has subquestions
        $isEmpty = empty($subquestions);
        $isValid = TRUE;
        if($isEmpty)
        {
            $isValid = FALSE;
            $this->addErrorMessage(self::ZERO_SUBQUESTION_ERROR);
        }
        //validates each subquestion
        foreach ($subquestions as $key => $subquestion)
        {
            //checks the existance of the properties description and isCorrect
            $hasTitle = BasicValidations::getInstance()->validateRequiredField($subquestion, 'title');
            $hasOptions = $this->validateMultipleSelectionSubqustionOptions($subquestion->options);

            if(!$hasTitle || !$hasOptions)
            {
                $isValid = FALSE;
                $this->addErrorMessage(self::INVALID_SUBQUESTION);
            }
        }

        return $isValid;
    }

    protected function validateMultipleSelectionSubqustionOptions($options)
    {
        //validates if $options is not empty
        $isEmpty = empty($options);
        $isValid = TRUE;
        if($isEmpty)
        {
            $isValid = FALSE;
            $this->addErrorMessage(self::ZERO_SUBQUESTION_OPTIONS_ERROR);
        }
        //validates each subquestion
        foreach ($options as $key => $option)
        {
            //checks the existance of the property "description"
            $hasDescription = BasicValidations::getInstance()->validateRequiredField($option, 'description');
            if(!$hasDescription)
            {
                $isValid = FALSE;
                $this->addErrorMessage(self::EMPTY_OPTION_DESCRIPTION);
            }
        }

        return $isValid;
    }

    protected function validateGeneralQuestion($question)
    {
        $validTitle       = BasicValidations::getInstance()->validateRequiredField($question,'title');
        $validType      = TRUE; //TODO
        if(!$validTitle || !$validType) $this->addErrorMessage(self::INVALID_QUESTION);
        return $validType && $validTitle;
    }

    protected function validateMultipleChoiceQuestion($question)
    {
        $validGeneralData = $this->validateGeneralQuestion($question);
        $validOptions   = $this->validateMultipleChoiceOptions($question->options);
        return $validGeneralData && $validOptions;
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
            $hasDescription = BasicValidations::getInstance()->validateRequiredField($option, 'description');
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



}
