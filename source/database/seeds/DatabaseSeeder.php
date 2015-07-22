<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Questionnaire;
use App\Models\Question;
use App\Models\MultipleChoiceQuestionSingleOption;
use App\Models\MultipleChoiceQuestionMultipleOptions;
use App\Models\MultipleChoiceOption;
use App\Models\Email;
use App\Models\QuestionnaireRespondent;
use App\Models\Picture;
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

        $this->call('QuestionnairesTableSeeder');
        $this->call('QuestionsTableSeeder');
        $this->call('OptionsTableSeeder');
        $this->call('QuestionnaireRespondentsTableSeeder');
        $this->call('EmailsTableSeeder');
        $this->call('PictureTableSeeder');

        Model::reguard();
    }
}

class QuestionnairesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('questionnaires')->delete();

        Questionnaire::create(
          array(
            'title'=>'La mejor musica del mundo',
            'description'=> 'Nuestros clientes utilizaran esta información para construir ilegalmente un robot que sera capas de generar musica secretamente para luego vender merchandising </br> Changos, no se porque dije que era mi cliente </br> Changos, no se porque dije que era ilegal.',
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
            'questionnaire_id' => 1
        ));

        MultipleChoiceQuestionMultipleOptions::create(
        array(
            'description'=>'para usted, el pop deberia tener más...."',
            'questionnaire_id' => 1
        ));

        MultipleChoiceQuestionSingleOption::create(
        array(
            'description'=>'Indique la opción que usted asemeja más a la musica "dubstep"',
            'questionnaire_id' => 1
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

class QuestionnaireRespondentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('questionnaire_respondents')->delete();
        QuestionnaireRespondent::create(
        array());
    }
}

class EmailsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('emails')->delete();
        Email::create(
        array(
            'address'=>'leian1306@gmail.com',
            'questionnaire_respondent_id' => 1
        ));
    }
}

class PictureTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('pictures')->delete();
        Picture::create(
            array(
                'path'=>'jazz_bass-wallpaper-1600x900.jpg',
                'question_id'=>2
            )
        );
    }
}
