<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Survey;
use App\Models\Question;
use App\Models\MultipleChoiceQuestionSingleOption;
use App\Models\MultipleChoiceQuestionMultipleOptions;
use App\Models\MultipleChoiceOption;

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
        $this->call('OptionsTableSeeder');

        Model::reguard();
    }
}

class SurveysTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('surveys')->delete();

        Survey::create(
          array(
            'title'=>'La mejor musica del mundo',
            'substract'=> 'Nuestros clientes utilizaran esta información para construir ilegalmente un robot que sera capas de generar musica secretamente para luego vender merchandising </br> Changos, no se porque dije que era mi cliente </br> Changos, no se porque dije que era ilegal.',
            'activeFrom' => date("2015-06-30"),
            'activeTo'=>null));
    }

}

class QuestionsTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('questions')->delete();
    Question::create(
      array(
        'description'=>'Indique con sus palabras que le gusta de los cantantes de disney?',
        'survey_id' => 1));

    MultipleChoiceQuestionMultipleOptions::create(
      array(
        'description'=>'para usted, el pop deberia tener más...."',
        'survey_id' => 1));
    MultipleChoiceQuestionSingleOption::create(array(
      'description'=>'Indique la opción que usted asemeja más a la musica "dubstep"',
      'survey_id' => 1
    ));
  }
}
class OptionsTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('multiple_choice_options')->delete();
    MultipleChoiceOption::create(array(
      'description'=>'Estrofas del estilo eeeh eh ehh',
      'question_id'=>2
    ));
    MultipleChoiceOption::create(array(
      'description'=>'Pitbull',
      'question_id'=>2
    ));
    MultipleChoiceOption::create(array(
      'description' =>'Adolescentes rubias',
      'question_id' =>2
    ));
    MultipleChoiceOption::create(array(
      'description'   =>'Otros:',
      'is_other_option' => TRUE,
      'question_id'   => 2
    ));

    MultipleChoiceOption::create(array(
      'description'=>'Llaves en una licuadora',
      'question_id'=>3
    ));
    MultipleChoiceOption::create (array(
      'description'=>'Modem de 56k conectandose a internet',
      'question_id'=>3
    ));
    MultipleChoiceOption::create(array(
      'description'     =>'Otra:',
      'is_other_option' =>TRUE,
      'question_id'     =>3
    ));
  }
}
