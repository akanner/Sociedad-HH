<?php
namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\Question;
use App\Models\QuestionnaireRespondent;
use App\Models\MultipleChoiceOption;
use App\Models\AnsweredWithOption;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use \StdClass as StdClass;
use App\Utils\MailHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 *
 */
class QuestionnaireController extends Controller
{
    //names of the params of the request
    const REQUEST_PARAM_QUESTIONNAIRE_ID= "questionnaireId";
    const REQUEST_PARAM_QUESTION        = "question_";
    const REQUEST_PARAM_EMAIL           = "email_address";
    const REQUEST_PARAM_NAME            = "userName";
    /* ----------------------------------------------------- */
    const EMAIL_KEY                     = "email";


    public function listAll()
    {
        $questionnaires = Questionnaire::all();
        return view('pages.questionnaires.list',['questionnaires' => $questionnaires]);
    }

    public function details($id)
    {
        try
        {
            $questionnaire = Questionnaire::findOrFail($id);
            return view('pages.questionnaires.completeQuestionnaire',['questionnaire'=>$questionnaire]);
        }
        catch (ModelNotFoundException $e)
        {
            abort(404);
        }
    }

    public function completeQuestionnaire(Request $request)
    {
        //gets the parameters of the questions
        $parametersOfTheQuestions = $this->filterQuestionParameters($request->all());
        $email = $request->input(self::REQUEST_PARAM_EMAIL);
        $userName = $request->input(self::REQUEST_PARAM_NAME);
        $questionnaireId = $request->input(self::REQUEST_PARAM_QUESTIONNAIRE_ID);
        //build an object with all the parameters
        $questionnaireInfo = $this->buildQuestionnaireInfo($email,$userName,$questionnaireId,$parametersOfTheQuestions);

        $this->persistCompletedQuestionnaire($questionnaireInfo);

        MailHelper::getInstance()->sendMail('agustinkanner@gmail.com','leito.vm3@hotmail.com','Leandro "el duro" Vilas','Testing',"emails.prueba", ["userMessage" => 'quiero almendrado']);

        return view("confirmations.confirmationMessage", [
            "message" => "¡Gracias por completar la encuesta, un mail le llegara pronto!",
            "linkTo" => "/home",
            "linkLabel" => "Volver al home"
        ]);
    }

    private function buildQuestionnaireInfo($email,$userName,$questionnaireId,$parametersOfTheQuestions)
    {
        $questionnaireInfo=new StdClass();
        $questionnaireInfo->email = $email;
        $questionnaireInfo->userName = $userName;
        $questionnaireInfo->questionnaireId = $questionnaireId;
        $questionnaireInfo->questions = $this->processQuestionParameters($parametersOfTheQuestions);
        return $questionnaireInfo;
    }
    /**
     * persists a questionnaire completed by the user
     *
     * @param array $questionnaireInfo
     */
    public function persistCompletedQuestionnaire($questionnaireInfo)
    {
        //finds the user who has completed the questionnaire or creates a new one
        $emailKey = self::EMAIL_KEY;
        $email = $questionnaireInfo->$emailKey;
        //gets the respondent
        $respondent = QuestionnaireRespondent::findFirstWithEmailOrNew($email);
        //-----------------------------------------------------------------------
        // if the user didn't have a name, sets it with the request's, even if it's blank (no need for validation)
        if($respondent->getName() == "" || $respondent->getName() == null) {
            $respondent->setName($questionnaireInfo->userName);
            $respondent->save();
        }
        //-----------------------------------------------------------------------
        //gets the questionnaire
        $questionnaireKey   =  self::REQUEST_PARAM_QUESTIONNAIRE_ID;
        $questionnaireId    = $questionnaireInfo->$questionnaireKey;
        $questionnaire      = Questionnaire::find($questionnaireId);
        //-----------------------------------------------------------------------

        foreach ($questionnaireInfo->questions as $idQuestion => $answer)
        {   //gets the question
            $question = Question::find($idQuestion);
            //gets the selected option
            $optionSelected =MultipleChoiceOption::find($answer->option);
            //saves the answer
            $textOtherOption = isset($answer->text) ? $answer->text : NULL;//probably null, i dont care
            $answer = AnsweredWithOption::createNewAnswerFor($respondent,$questionnaire,$question,$optionSelected,$textOtherOption);
        }
    }
    /**
     * filters the parameters that have the substring "question_" in their key
     */
    public function filterQuestionParameters($requestParameters)
    {
        // return array_filter($requestParameters,
        // function($value, $key)
        // {
        //     return strpos($key,self::REQUEST_PARAM_QUESTION) !== false;
        // },
        // ARRAY_FILTER_USE_BOTH);
        $filteredParameters = array();
        foreach ($requestParameters as $key => $value)
        {
            if(strpos($key,self::REQUEST_PARAM_QUESTION) !== false)
            {
                $filteredParameters[$key] = $value;
            }


        }
        return $filteredParameters;
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
