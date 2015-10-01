<?php
namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\Question;
use App\Models\QuestionnaireRespondent;
use App\Models\MultipleChoiceOption;
use App\Models\AnsweredWithOption;
use App\Models\QuestionnaireResponseDeserializer;
use App\Utils\PathHelper;
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
    /* ----------------------------------------------------- */



    public function listAll()
    {
        $questionnaires = Questionnaire::allActive();
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
        // Gets the parameters of the questions
        $parametersOfTheQuestions = $this->filterQuestionParameters($request->all());
        $email = $request->input(self::REQUEST_PARAM_EMAIL);
        $userName = $request->input(self::REQUEST_PARAM_NAME);
        $questionnaireId = $request->input(self::REQUEST_PARAM_QUESTIONNAIRE_ID);

        // Build an object with all the parameters
        $questionnaireInfo = $this->buildQuestionnaireInfo($email,$userName,$questionnaireId,$parametersOfTheQuestions);

        $this->persistCompletedQuestionnaire($questionnaireInfo);

        $questionnaire = Questionnaire::find($questionnaireId);
        $attachedFilePath = PathHelper::getPathToUploaded() . "/" . $questionnaire->getAttachedFilePath();
            MailHelper::getInstance()->queueMail(
                'agustinkanner@gmail.com',
                'leito.vm3@hotmail.com',
                'Leandro "el duro" Vilas'
                ,'Testing'
                ,"emails.prueba"
                , ["userMessage" => 'aguante la queue'],
                $attachedFilePath,
                $questionnaire->getAttachedFileLogicalName()
            );


        return view("confirmations.confirmationMessage", [
            "message" => "¡Gracias por completar la encuesta, un mail le llegara pronto!",
            "linkTo" => "/home",
            "linkLabel" => "Volver al home"
        ]);
    }

    private function buildQuestionnaireInfo($email,$userName,$questionnaireId,$parametersOfTheQuestions)
    {
        return QuestionnaireResponseDeserializer::getInstance()->buildQuestionnaireInfo($email,$userName,$questionnaireId,$parametersOfTheQuestions);
    }
    /**
     * persists a questionnaire completed by the user
     *
     * @param array $questionnaireInfo
     */
    public function persistCompletedQuestionnaire($questionnaireInfo)
    {
        // Finds the user who has completed the questionnaire or creates a new one
        $emailKey = self::EMAIL_KEY;
        $email = $questionnaireInfo->$emailKey;

        // Gets the respondent
        $respondent = QuestionnaireRespondent::findFirstWithEmailOrNew($email);
        //-----------------------------------------------------------------------
        // if the user didn't have a name, sets it with the request's parameter, even if it's blank (no need for validation)
        if($respondent->getName() == "" || $respondent->getName() == null) {
            $respondent->setName($questionnaireInfo->userName);
            $respondent->save();
        }

        //-----------------------------------------------------------------------
        // // Gets the questionnaire
        // $questionnaireKey   =  self::REQUEST_PARAM_QUESTIONNAIRE_ID;
        // $questionnaireId    = $questionnaireInfo->$questionnaireKey;
        // $questionnaire      = Questionnaire::find($questionnaireId);
        //-----------------------------------------------------------------------

        foreach ($questionnaireInfo->questions as $idQuestion => $answerData)
        {   //gets the question
            $question = Question::find($idQuestion);
            //saves the answer
            $question->createNewAnswerForMyself($respondent,$answerData);
        }
    }
    /**
     * filters the parameters that have the substring "question_" in their key
     */
    public function filterQuestionParameters($requestParameters)
    {
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

}
