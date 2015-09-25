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

use App\Utils\PrettyJson;
use Carbon\Carbon;

class QuestionnaireBackendController extends Controller {

    const UPLOADS_PATH = '../../public/uploaded/';

    public function add() {
        return view("backend.questionnaires.add");
    }

    public function createQuestionByFormQuestion($formQuestion, $questionnaire) {
        $question = QuestionFactory::getInstance()->getQuestionByClassName($formQuestion->type);
        $question->setDescription($formQuestion->title);
        $question->setQuestionnaire($questionnaire);
        $question->save();

        foreach($formQuestion->options as $formOption) {
            $option = new MultipleChoiceOption();
            $option->setDescription($formOption->description);
            $option->setIsCorrectAnswer($formOption->isCorrect);
            $option->setIsOtherOption($formOption->isOtherOption);
            $option->setQuestion($question);
            $option->save();
        }

        return $question;
    }

    private function hashFileName($fileName) {

        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $hashedName = md5(Carbon::now()->toDateTimeString().$fileName);
        return "$hashedName.$ext";
    }

    /**
     * Symfony\Component\HttpFoundation\File\UploadedFile $file
     * $request->file('photo')
     * http://laravel.com/docs/5.1/requests
     * http://stackoverflow.com/questions/2704314/multiple-file-upload-in-php
     * http://www.w3bees.com/2013/02/multiple-file-upload-with-php.html
     */
    private function moveFile($file, $destinationPath,$newName) {
        $file->move($destinationPath, $newName);
    }

    public function listAll() {
        $questionnaires = Questionnaire::all();
        return view("backend.questionnaires.list",
        ['questionnaires' => $questionnaires]);
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

    public function save(SaveQuestionnaireRequest $request) {

        $result = new \stdClass();
        $result->statusOk = true;

        try {
            $formQuestionnaire = json_decode($request->input("questionnaire"));
            $questionnaire = new Questionnaire();

            $questionnaire->setTitle($formQuestionnaire->title);
            $questionnaire->setDescription($formQuestionnaire->description);
            $questionnaire->setActiveFrom(Carbon::now());


            if($request->hasFile('attachedFile'))
            {
                $file = $request->file('attachedFile');
                $hashedName = $this->hashFileName($file->getClientOriginalName());
                $this->moveFile($file,self::UPLOADS_PATH,$hashedName);
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

    /*
    Verifying File Presence

    You may also determine if a file is present on the request using the hasFile method:

    if ($request->hasFile('photo')) {
    }
    Validating Successful Uploads

    In addition to checking if the file is present, you may verify that there were no problems uploading the file via the isValid method:

    if ($request->file('photo')->isValid())
    {
    }
    */

    public function flagQuestionnaireAs(ChangeStatusQuestionnaireRequest $request)
    {
        $idQuestionnaire =      $request->input("questionnaireId");
        $questionnaireStatus =  $request->input("status");
        $questionnaire = Questionnaire::findOrFail($idQuestionnaire);
        $questionnaire->setActive($questionnaireStatus);
        $questionnaire->save();
        return 'true';
    }

}
