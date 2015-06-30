<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Survey;
use App\Models\TextQuestion;

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
        $this->call('TextQuestionsTableSeeder');

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

class TextQuestionsTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('text_questions')->delete();
    $question = TextQuestion::create(array('description'=>'eeeeeeeeeeeeehhhhhhhhh','survey_id' => 1));
  }
}
