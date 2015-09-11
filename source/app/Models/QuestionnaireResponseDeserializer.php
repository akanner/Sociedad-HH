<?php
namespace App\Models;
/**
 * de serializes the response of "completeQuestionnaireform"
 */
class QuestionnaireResponseDeserializer
{
    private static $instance;

    private function __construct() {}

    public static function getInstance() {
        if (!static::$instance instanceof self) {
            static::$instance = new self;
        }

        return static::$instance;
    }

    public function buildQuestionnaireInfo($email,$userName,$questionnaireId,$parametersOfTheQuestions)
    {
        $questionnaireInfo=new \StdClass();
        $questionnaireInfo->email = $email;
        $questionnaireInfo->userName = $userName;
        $questionnaireInfo->questionnaireId = $questionnaireId;
        $questionnaireInfo->questions = $this->processQuestionParameters($parametersOfTheQuestions);

        return $questionnaireInfo;
    }


    /**
     * builds an array of objects with the information of the questions
     *
     * @param array http params of the questionnaire´s questions
     *
     * @return [StdClass] structure with the information of the questions
     */
    private function processQuestionParameters($parametersOfTheQuestions)
    {
        $questions = array();
        //process the http parameters
        foreach ($parametersOfTheQuestions as $key => $answerData)
        {
            /*
             * $questionExplote[0] => "QUESTION"
             * $questionExplote[1] => id of the question, we will use it as key on $questions
             */
            $questionId = explode("_",$key)[1];
            $questions[$questionId] = $answerData;
        }

        return $questions;
    }
}


?>
