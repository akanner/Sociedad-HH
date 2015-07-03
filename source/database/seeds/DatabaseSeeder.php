<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Survey;
use App\Models\Question;
use App\Models\MultipleChoiceQuestion;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('SurveysTableSeeder');
        $this->call('QuestionsTableSeeder');

        Model::reguard();
    }
}

class SurveysTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('surveys')->delete();

        Survey::create(array('title'=>'survey test','substract'=> 'a test','activeFrom' => date("2015-06-30"),'activeTo'=>null));
    }

}

class QuestionsTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('questions')->delete();
    Question::create(array('description'=>'eeeeeeeeeeeeehhhhhhhhh','survey_id' => 1));
    MultipleChoiceQuestion::create(array('description'=>'a)eeeeeeeeeeeeehhhhhhhhh b)"pienso de que ehhhh"','survey_id' => 1));
  }
}
