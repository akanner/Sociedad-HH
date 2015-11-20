<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveQuestionnaireRequest;
use App\Http\Requests\ChangeStatusQuestionnaireRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\Questionnaire;
use App\Models\Question;
use App\Models\QuestionFactory;
use App\Models\MultipleChoiceOption;

use App\Models\Email;
use App\Utils\MailHelper;
use App\Utils\PathHelper;

use App\Utils\PrettyJson;
use Carbon\Carbon;

class QuestionnaireBackendController extends Controller {

    public function add() {
        return view("backend.questionnaires.add");
    }

    public function createQuestionByFormQuestion($formQuestion, $questionnaire) {
        $question = QuestionFactory::getInstance()->createQuestionFromFormQuestion($formQuestion,$questionnaire);
        return $question;
    }

    private function hashFileName($fileName) {

        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $hashedName = md5(Carbon::now()->toDateTimeString().$fileName);
        return "$hashedName.$ext";
    }

    private function moveFile($file, $destinationPath,$newName) {
        $file->move($destinationPath, $newName);
    }

    public function listAll() {
        $questionnaires = Questionnaire::all();

        return view("backend.questionnaires.list", [
            'questionnaires' => $questionnaires
        ]);
    }

    public function report($id)
    {
        try
        {
            $questionnaire = Questionnaire::findOrFail($id);

            return view("backend.questionnaires.report", [
                'questionnaireReport' => $questionnaire->getReport()
            ]);
        }
        catch (ModelNotFoundException $e)
        {
            abort(404);
        }
    }


    public function basicReport($id)
    {
        try
        {
            $questionnaire = Questionnaire::findOrFail($id);

            return view("backend.questionnaires.basicReport", [
                'questionnaireReport' => $questionnaire->getReport()
            ]);
        }
        catch (ModelNotFoundException $e)
        {
            abort(404);
        }
    }

    public function save(SaveQuestionnaireRequest $request) {

        $result = new \stdClass();
        $result->statusOk = true;

        try {
            $formQuestionnaire = json_decode($request->input("questionnaire"));
            $questionnaire = new Questionnaire();

            $questionnaire->setHeading($formQuestionnaire->heading);
            $questionnaire->setTitle($formQuestionnaire->title);
            $questionnaire->setDescription($formQuestionnaire->description);
            $questionnaire->setActiveFrom(Carbon::now());

            if($request->hasFile('attachedFile'))
            {
                $file = $request->file('attachedFile');

                $hashedName = $this->hashFileName($file->getClientOriginalName());
                $this->moveFile($file, PathHelper::getInstance()->getPathToUploaded(), $hashedName);
                $questionnaire->setAttachedFilePath($hashedName);
                $questionnaire->setAttachedFileLogicalName($file->getClientOriginalName());
            }

            $questionnaire->save();

            foreach ($formQuestionnaire->questions as $formQuestion) {
                $this->createQuestionByFormQuestion($formQuestion, $questionnaire);
            }

        } catch(Exception $e) {
            $result->statusOk = false;
            $result->message = $e->getMessage();
            $result->questionnaire = $request->input("questionnaire");
        } finally {
            return json_encode($result);
        }
    }

    public function flagQuestionnaireAs(ChangeStatusQuestionnaireRequest $request)
    {
        $idQuestionnaire =      $request->input("questionnaireId");
        $questionnaireStatus =  $request->input("status");
        $questionnaire = Questionnaire::findOrFail($idQuestionnaire);
        $questionnaire->setActive($questionnaireStatus);
        $questionnaire->save();

        return 'true';
    }


    /**
     * Send mails to inform the users of new quenstionnaires
     */
    public function invite($id)
    {
        try
        {
            $emailsDirections = $this->getUsersEmailDirections();
            $this->sendInvitationEmails($emailsDirections, $id);

            return $this->buildInvitationResponse(TRUE,"");
        }
        catch (Exception $e)
        {
            return $this->buildInvitationResponse(FALSE,$e->getMessage());
        }
    }

    public function getUsersEmailDirections()
    {
        $emailArray = Email::all()->toArray();
        return array_map(function($email){return $email["address"];},$emailArray);
    }

    public function sendInvitationEmails($emailsDirections, $questionnaireId)
    {
        foreach ($emailsDirections as $key => $emailAddress)
        {

            $mailHelper = MailHelper::getInstance();
            $mailHelper->queueMail(
                $mailHelper->getMyEmailAddress(),
                $emailAddress,
                'Sociedad de Hematologia y Hemoterapia de La Plata'
                ,'Te invitamos a participar!'
                ,"emails.invitations"
                , ["questionnaireId" => $questionnaireId]
                ,null
                ,null
            );
        }
    }

    public function buildInvitationResponse($operationStatus,$message)
    {
        $response = new \StdClass();
        $response->success = $operationStatus;
        $response->message = $message;
        return json_encode($response);
    }


}
