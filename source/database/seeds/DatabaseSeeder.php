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
            'description'=> 'Nuestros clientes utilizarán esta información para construir ilegalmente un robot que sera capaz de generar música secretamente para luego vender merchandising </br> Changos, no se por qué dije que era mi cliente </br> Changos, no se por qué dije que era ilegal.',
            'activeFrom' => date("2015-06-30"),
            'activeTo'=>null));
        Questionnaire::create(
        array(
            'title' => 'Series de televisión',
            'description' => 'las mejores series de televisión (entre los canales 60 al 70)',
            'activeFrom' => date("2015-07-21"),
            'activeTo'   => null));
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

        MultipleChoiceQuestionSingleOption::create(
        array(
            'description'=>'Cuál es el mejor programa de eliminación de tatuajes?',
            'questionnaire_id' => 2
        ));
        MultipleChoiceQuestionSingleOption::create(
        array(
            'description'=>'Usted cree que Don cangrejo se va a afeitar?',
            'questionnaire_id' => 2
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
      'correct_answer'=>TRUE,
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
      'description'=>'Modem de 56k conectándose a internet',
      'question_id'=>3
    ));
    MultipleChoiceOption::create(array(
      'description'     =>'Otra:',
      'is_other_option' =>TRUE,
      'question_id'     =>3
    ));
    MultipleChoiceOption::create(array(
        'description'=>'El que los removedores parecen judios-amish',
        'question_id'=>4
    ));
    MultipleChoiceOption::create(array(
        'description'=>'El que te cuentan las historias de forma muy exagerada',
        'correct_answer' => TRUE,
        'question_id'=>4
    ));
    MultipleChoiceOption::create(array(
        'description'=>'Yo diría que si',
        'question_id'=>5
    ));
    MultipleChoiceOption::create(array(
        'description'=>'no veo por qué no',
        'correct_answer' => TRUE,
        'question_id'=>5
    ));
    MultipleChoiceOption::create(array(
        'description'=>'Déjame llamar a mi amigo que es experto en hombres que están apunto de afeitarse',
        'question_id'=> 5
    ));
    MultipleChoiceOption::create(array(
        'description'=>'Otra',
        'is_other_option'=>TRUE,
        'question_id'=>5
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
