<?php
namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\QuestionnaireRespondent;
use Illuminate\Support\Facades\Input;

/**
 *
 */
class QuestionnaireController extends Controller
{
  public function listAll()
  {
    $questionnaires = Questionnaire::all();
    $respondents = QuestionnaireRespondent::all();

    return view('pages.questionnaires.list',['questionnaires' => $questionnaires, 'respondents' => $respondents]);
  }

  public function details($id)
  {
    $questionnaire = Questionnaire::where("id","=",$id)->first();
    return view('pages.questionnaires.completeQuestionnaire',['questionnaire'=>$questionnaire]);
  }

  public function completeQuestionnaire()
  {
      die("<pre>" . print_r(Input::all(),TRUE) . "</pre>" );
  }
}
