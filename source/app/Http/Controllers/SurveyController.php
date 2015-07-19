<?php
namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyRespondent;

/**
 *
 */
class SurveyController extends Controller
{
  public function listAll()
  {
    $surveys = Survey::all();
    $respondents = SurveyRespondent::all();

    return view('pages.surveys.list',['surveys' => $surveys, 'respondents' => $respondents]);
  }

  public function details($id)
  {
    $survey = Survey::where("id","=",$id)->first();
    return view('pages.surveys.completeSurvey',['survey'=>$survey]);
  }
}
