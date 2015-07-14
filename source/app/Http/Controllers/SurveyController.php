<?php
namespace App\Http\Controllers;

use App\Models\Survey;
/**
 *
 */
class SurveyController extends Controller
{
  public function index()
  {
    $surveys = Survey::all();
    return view('pages.surveys.index',['surveys' => $surveys]);
  }

  public function details($id)
  {
    $survey = Survey::where("id","=",$id)->first();
    return view('pages.surveys.completeSurvey',['survey'=>$survey]);
  }
}
