<?php


use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\SurveyRespondent;
use App\Models\UserAnswer;
use App\Models\Survey;
use App\Models\Question;
use App\Models\MultipleChoiceOptionQuestion;
use App\Utils\PrettyJson;
/**
 *
 */
class SurveyTest extends BasicTest
{

  public function testSurvey()
  {
    // $this->assertTrue(TRUE);
    //
    // $survey =Survey::where("id","=",1)->with(array("questions"))->first();
    // echo PrettyJson::printPrettyJson($survey->toJson());
    //
    // foreach ($survey->getQuestions() as $question)
    // {
    //     echo $question->whoami() . PHP_EOL;
    // }

    $this->visit("/test");
  }
}
