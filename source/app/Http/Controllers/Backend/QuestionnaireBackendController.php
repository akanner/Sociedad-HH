<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Questionnaire;
use App\Http\Requests\SaveQuestionnaireRequest;

use App\Utils\PrettyJson;

class QuestionnaireBackendController extends Controller {

    private function hashImageName($imageName) {
        return md5(Carbon::now()->toDateTimeString().$imageName);
    }

    /**
     * Symfony\Component\HttpFoundation\File\UploadedFile $file
     * $request->file('photo')
     * http://stackoverflow.com/questions/2704314/multiple-file-upload-in-php
     * http://www.w3bees.com/2013/02/multiple-file-upload-with-php.html
     */
    private function moveFile($file, $destinationPath) {
        $file->move($destinationPath, $this->hashImageName($file->getClientOriginalName()));
    }

    public function listAll() {
        $questionnaires = Questionnaire::all();
        return PrettyJson::printPrettyJson($questionnaires);
    }

    public function add() {
        return view("backend.questionnaires.add");
    }

    public function save(SaveQuestionnaireRequest $request) {

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
}
