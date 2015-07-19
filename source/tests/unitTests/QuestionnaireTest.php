<?php


use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Questionnaire;
use App\Models\Question;
use App\Models\MultipleChoiceOptionQuestion;
/**
 *
 */
class QuestionnaireTest extends BasicTest
{

  public function setUp()
  {
    parent::setUp();
    Questionnaire::create(array('title'=>'questionnaire test','description'=> 'a test','activeFrom' => date("2015-06-30"),'activeTo'=>null));
  }
  public function testQuestionnaire()
  {
    $this->assertTrue(TRUE);

    $questionnaire =Questionnaire::where("id","=",1)->with(array("questions"))->first();
    echo $questionnaire->toJson();
  }
}
