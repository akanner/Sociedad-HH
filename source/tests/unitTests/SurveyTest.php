<?php


use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Survey;
use App\Models\Question;
use App\Models\MultipleChoiceOptionQuestion;
/**
 *
 */
class SurveyTest extends BasicTest
{

  public function setUp()
  {
    parent::setUp();
    Survey::create(array('title'=>'survey test','substract'=> 'a test','activeFrom' => date("2015-06-30"),'activeTo'=>null));
  }
  public function testSurvey()
  {
    $this->assertTrue(TRUE);

    $survey =Survey::where("id","=",1)->with(array("questions"))->first();
    echo $survey->toJson();
  }
}
