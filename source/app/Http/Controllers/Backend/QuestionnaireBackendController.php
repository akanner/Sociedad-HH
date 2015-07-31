<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Questionnaire;
use App\Http\Requests\SaveQuestionnaireRequest;

use App\Utils\PrettyJson;

class QuestionnaireBackendController extends Controller {

    public function listAll() {
        $questionnaires = Questionnaire::all();
        return PrettyJson::printPrettyJson($questionnaires);
    }

    public function add() {
        return view("backend.questionnaires.add");
    }

    public function save(SaveQuestionnaireRequest $request) {

    }
}
