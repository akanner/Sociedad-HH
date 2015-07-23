<?php
namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\QuestionnaireRespondent;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use \StdClass as StdClass;

/**
 *
 */
class QuestionnaireController extends Controller
{
    //names of the params of the request
    const REQUEST_PARAM_QUESTIONNAIRE_ID= "questionnaireId";
    const REQUEST_PARAM_QUESTION        = "question_";
    const REQUEST_PARAM_EMAIL           = "email_address";

    public function listAll()
    {
        $questionnaires = Questionnaire::all();
        return view('pages.questionnaires.list',['questionnaires' => $questionnaires]);
    }

    public function details($id)
    {
        $questionnaire = Questionnaire::where("id","=",$id)->first();
        return view('pages.questionnaires.completeQuestionnaire',['questionnaire'=>$questionnaire]);
    }

    public function completeQuestionnaire(Request $request)
    {
        //gets the parameters of the questions
        $parametersOfTheQuestions = $this->filterQuestionParameters($request->all());

        //build an object with all the parameters
        $questionnaireInfo=new StdClass();
        $questionnaireInfo->email = $request->input(self::REQUEST_PARAM_EMAIL);
        $questionnaireInfo->questionnaireId = $request->input(self::REQUEST_PARAM_QUESTIONNAIRE_ID);
        $questionnaireInfo->questions = $this->processQuestionParameters($parametersOfTheQuestions);


        die("<pre>" . print_r($questionnaireInfo,TRUE) . "</pre>" );
    }

    /**
     * filters the parameters that have the substring "question_" in their key
     */
    public function filterQuestionParameters($requestParameters)
    {
        return array_filter($requestParameters,
        function($value, $key)
        {
            return strpos($key,self::REQUEST_PARAM_QUESTION) !== false;
        },
        ARRAY_FILTER_USE_BOTH);
    }
    /**
     * builds an array of objects with the information of the questions
     *
     * @param array http params of the questionnaire´s questions
     *
     * @return [StdClass] structure with the information of the questions
     */
    public function processQuestionParameters($parametersOfTheQuestions)
    {
        $questions = array();
        //process the http parameters
        foreach ($parametersOfTheQuestions as $key => $value) {
            $questionExplote = explode("_",$key);
            /*
             * $questionExplote[0] => "QUESTION"
             * $questionExplote[1] => id of the question, we will use it as key on $questions
             * $questionExplote[2] => "option" or "text" identifies the value of this parameter
             *
             * we will use "option" to identify an id of an option and "text" to identify text inputted by the user.
             */
            $key = $questionExplote[1];
            $subindex = $questionExplote[2];
            if(array_key_exists($key,$questions))
            {
                $answer = $questions[$key];
                $answer->$subindex = $value;

            }
            else
            {
                //if the position $key of the array is null then we create a new object
                $answer = new StdClass();
                $answer->idQuesion = $key;
                $answer->$subindex = $value;
                $questions[$key] = $answer;
            }

        }
        return $questions;
    }
}
