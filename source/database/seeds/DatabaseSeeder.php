<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Questionnaire;

use App\Models\Question;
use App\Models\MultipleChoiceQuestionSingleOption;
use App\Models\MultipleChoiceQuestionMultipleOptions;
use App\Models\MultipleSelectionQuestion;
use App\Models\MultipleSelectionSubquestion;

use App\Models\MultipleChoiceOption;
use App\Models\MultipleSelectionOption;

use App\Models\Email;
use App\Models\QuestionnaireRespondent;
use App\Models\Picture;
use App\User;

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
        $this->call('SubquestionsTableSeeder');
        $this->call('OptionsTableSeeder');
        $this->call('QuestionnaireRespondentsTableSeeder');
        $this->call('EmailsTableSeeder');
        $this->call('PictureTableSeeder');
        $this->call('UserTableSeeder');

        Model::reguard();
    }
}

class QuestionnairesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('questionnaires')->delete();

        /* EL Cuestionario!!! */
        Questionnaire::create(
          array(
            'title'=>'ENCUESTA A LA SOCIEDAD DE HEMATOLOGOS',
            'description'=> 'La Sociedad de Hematología y Hemoterapia de La Plata ha desarrollado la siguiente encuesta que tiene como objetivo conocer el razonamiento médico del especialista ante ciertas patologías.
Les pedimos que se tomen únicamente cinco minutos para contestarla, ya que su respuesta colaborará con la elaboración de contenidos que enriquezcan la formación profesional.',
            'heading' => "CONSTRUYAMOS NUESTRO CONOCIMIENTO",
            'activeFrom' => date("2015-07-31"),
            'activeTo'=>null,
            'active' => TRUE,
            'locked' => TRUE
          ));
    }

}

class QuestionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('questions')->delete();

        /* EL Cuestionario!!! */
        MultipleChoiceQuestionSingleOption::create(
        array(
            'description'=>'Frente a un hombre de 42 años con Anemia leve, Trombocitopenia moderada, Hepatomegalia leve, Esplenomegalia grado 3 a 4, y dolor óseo crónico: ¿En cuál de los posibles diagnósticos pensaría para ese paciente?',
            'questionnaire_id' => 1
        ));

        MultipleSelectionQuestion::create(
        array(
            'description'=>'Ante un paciente de 42 años de edad con presunto diagnóstico de Leucemia aguda, mieloma múltiple o enfermedad de Gaucher, asigne el grado de relevancia (muy relevante, relevante o poco relevante) de cada síntoma para cada una de las patologías mencionadas.',
            'multiple_selection_answers' => '[{"description":"Muy Relevante","acronym":"MR"},{"description":"Relevante","acronym":"R"},{"description":"Poco Relevante","acronym":"PR"}]',
            'questionnaire_id' => 1
        ));

        MultipleSelectionQuestion::create(
        array(
            'description'=>'Qué estudios solicitaría, dando relevancia (nunca, a veces, siempre) para cada una de las patologías antes mencionadas.',
            'multiple_selection_answers' => '[{"description":"Nunca","acronym":"N"},{"description":"A veces","acronym":"AV"},{"description":"Siempre","acronym":"S"}]',
            'questionnaire_id' => 1
        ));

        MultipleChoiceQuestionSingleOption::create(
        array(
            'description'=>'Ante las siguientes imágenes de Resonancia  y Rx. de un paciente con historial de anemia y dolor óseo ¿qué diagnóstico considera correcto?',
            'questionnaire_id' => 1
        ));
    }
}

class SubquestionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('multiple_selection_subquestions')->delete();

        /* EL Cuestionario!!! */

        MultipleSelectionSubquestion::create(array(
            'description' => 'Anemia, Trombocitopenia',
            'question_id' => 2
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'Hepatomegalia, Esplenomegalia',
            'question_id' => 2
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'Anemia, Trombocitopenia, Hepatomegalia, Esplenomegalia',
            'question_id' => 2
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'Anemia, Trombocitopenia, dolor óseo agudo ó crónico',
            'question_id' => 2
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'Hepatomegalia, Esplenomegalia, Dolor óseo agudo ó crónico',
            'question_id' => 2
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'Anemia, Trombocitopenia, Hepatomegalia, Esplenomegalia, Dolor óseo agudo ó crónico',
            'question_id' => 2
        ));


        MultipleSelectionSubquestion::create(array(
            'description' => 'Estudio hematológico de sangre periférica',
            'question_id' => 3
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'Laboratorio general',
            'question_id' => 3
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'Laboratorio general + LDH',
            'question_id' => 3
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'Laboratorio general + B2 Microglobulina',
            'question_id' => 3
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'Proteinograma elecroforético+ Dosaje de Inmunoglobulinas+ Proteinuria de Bence Jones',
            'question_id' => 3
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'Biopsia-Punción de Médula ósea',
            'question_id' => 3
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'Estudio Citogenético',
            'question_id' => 3
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'Estudios Moleculares',
            'question_id' => 3
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'PET',
            'question_id' => 3
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'Radiografías (Huesos Largos)',
            'question_id' => 3
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'Radiografías (Pulmón)',
            'question_id' => 3
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'Radiografías (Calota Craneana)',
            'question_id' => 3
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'Radiografías (Columna Lumbosacra)',
            'question_id' => 3
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'RNM (Ósea)',
            'question_id' => 3
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'RNM (Abdomen)',
            'question_id' => 3
        ));

        MultipleSelectionSubquestion::create(array(
            'description' => 'RNM (Cerebro)',
            'question_id' => 3
        ));

    }
}

class OptionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('multiple_choice_options')->delete();
        DB::table('multiple_selection_options')->delete();

        /* EL Cuestionario!!! */

        //-------- MULTIPLE CHOICE

        MultipleChoiceOption::create(array(
            'description'=>'Leucemia',
            'question_id'=>1
        ));

        MultipleChoiceOption::create(array(
            'description'=>'Linfoma',
            'question_id'=>1
        ));

        MultipleChoiceOption::create(array(
            'description'=>'Mieloma Múltiple',
            'question_id'=>1
        ));

        MultipleChoiceOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'question_id'=>1
        ));

        MultipleChoiceOption::create(array(
            'description'=>'Leucemia Granulocítica Crónica',
            'question_id'=>1
        ));

        MultipleChoiceOption::create(array(
            'description'=>'Desórdenes de Sangrado',
            'question_id'=>1
        ));

        MultipleChoiceOption::create(array(
            'description'=>'Otra',
            'is_other_option'=>TRUE,
            'question_id'=>1
        ));

        //-------- MULTIPLE SELECTION

        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>1
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>1
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>1
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>2
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>2
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>2
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>3
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>3
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>3
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>4
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>4
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>4
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>5
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>5
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>5
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>6
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>6
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>6
        ));

        //-------- MULTIPLE SELECTION

        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>7
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>7
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>7
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>8
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>8
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>8
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>9
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>9
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>9
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>10
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>10
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>10
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>11
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>11
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>11
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>12
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>12
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>12
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>13
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>13
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>13
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>14
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>14
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>14
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>15
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>15
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>15
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>16
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>16
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>16
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>17
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>17
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>17
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>18
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>18
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>18
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>19
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>19
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>19
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>20
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>20
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>20
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>21
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>21
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>21
        ));


        MultipleSelectionOption::create(array(
            'description'=>'Leucemia aguda',
            'subquestion_id'=>22
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Mieloma múltiple',
            'subquestion_id'=>22
        ));

        MultipleSelectionOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'subquestion_id'=>22
        ));

        //-------- MULTIPLE CHOICE

        MultipleChoiceOption::create(array(
            'description'=>'Mieloma Múltiple',
            'question_id'=>4
        ));

        MultipleChoiceOption::create(array(
            'description'=>'Enfermedad de Gaucher',
            'question_id'=>4
        ));

        MultipleChoiceOption::create(array(
            'description'=>'Leucemia Granulocítica Crónica',
            'question_id'=>4
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
            'address'=>'leito.vm3@hotmail.com',
            'questionnaire_respondent_id' => 1
        ));
        /*
        Email::create(array( 'address'=>'kleingra@speedy.com.ar' ));
        Email::create(array( 'address'=>'britinez@yahoo.com.ar' ));
        Email::create(array( 'address'=>'sandraargello@hotmail.com' ));
        Email::create(array( 'address'=>'celinavila@yahoo.com.ar' ));
        Email::create(array( 'address'=>'aznaraquino@hotmail.com' ));
        Email::create(array( 'address'=>'mercedesbol@hotmail.com' ));
        Email::create(array( 'address'=>'bunzelsu@hotmail.com' ));
        Email::create(array( 'address'=>'amcatt@intramed.net' ));
        Email::create(array( 'address'=>'martin_ciappa@yahoo.com.ar' ));
        Email::create(array( 'address'=>'a.cicchetti@hotmail.com' ));
        Email::create(array( 'address'=>'alcosmil@hotmail.com' ));
        Email::create(array( 'address'=>'fladamiani@hotmail.com' ));
        Email::create(array( 'address'=>'nestor.degaetano@speedy.com.ar' ));
        Email::create(array( 'address'=>'dsandro@speedy.com.ar' ));
        Email::create(array( 'address'=>'noraduy@hotmail.com' ));
        Email::create(array( 'address'=>'noraduy@fibertel.com.ar' ));
        Email::create(array( 'address'=>'enrico@netverk.com.ar' ));
        Email::create(array( 'address'=>'patriciagfazio@yahoo.com.ar' ));
        Email::create(array( 'address'=>'rifernan@infovia.com.ar' ));
        Email::create(array( 'address'=>'sandraformisano@yahoo.com.ar' ));
        Email::create(array( 'address'=>'gggagliardino@ciudad.com.ar' ));
        Email::create(array( 'address'=>'bramirezborga@yahoo.com.ar' ));
        Email::create(array( 'address'=>'martagelemur@hotmail.com' ));
        Email::create(array( 'address'=>'farinaoh@netverk.com.ar' ));
        Email::create(array( 'address'=>'giljuliet@gmail.com' ));
        Email::create(array( 'address'=>'sgrasso@lpsat.net' ));
        Email::create(array( 'address'=>'sebastianisnardi@yahoo.com.ar' ));
        Email::create(array( 'address'=>'ojakus@ciudad.com.ar' ));
        Email::create(array( 'address'=>'rcjau@hotmail.com' ));
        Email::create(array( 'address'=>'kleingra@speedy.com.ar' ));
        Email::create(array( 'address'=>'gmarin@netverk.com.ar' ));
        Email::create(array( 'address'=>'msmatano@yahoo.com.ar' ));
        Email::create(array( 'address'=>'milonejh@netverk.com.ar' ));
        Email::create(array( 'address'=>'orlando@way.com.ar' ));
        Email::create(array( 'address'=>'elsabpalomino@yahoo.com.ar' ));
        Email::create(array( 'address'=>'claudiaparodi05@hotmail.com' ));
        Email::create(array( 'address'=>'marielana@ciudad.com.ar' ));
        Email::create(array( 'address'=>'carlopon@fibertel.com.ar' ));
        Email::create(array( 'address'=>'mvprates@hotmail.com' ));
        Email::create(array( 'address'=>'oaromano57@gmail.com' ));
        Email::create(array( 'address'=>'garosiere@fibertel.com.ar' ));
        Email::create(array( 'address'=>'sandrar_hemato@hotmail.com' ));
        Email::create(array( 'address'=>'sabasilvia@speedy.com.ar' ));
        Email::create(array( 'address'=>'dianascebba@hotmail.com' ));
        Email::create(array( 'address'=>'mfschifini@yahoo.com.ar' ));
        Email::create(array( 'address'=>'schutten@netverk.com.ar' ));
        Email::create(array( 'address'=>'gladystebaldi@yahoo.com.ar' ));
        Email::create(array( 'address'=>'marcelatittarelli@yahoo.com.ar' ));
        Email::create(array( 'address'=>'vidaosca@ciudad.com.ar' ));
        Email::create(array( 'address'=>'sebastianyantorno@gmail.com' ));
        Email::create(array( 'address'=>'sabasilvia@hotmail.com' ));
        Email::create(array( 'address'=>'solecruset@hotmail.com' ));
        Email::create(array( 'address'=>'julietadalmaroni@hotmail.com' ));
        Email::create(array( 'address'=>'mariacecidacun@hotmail.com' ));
        Email::create(array( 'address'=>'citometriacucaiba@gmail.com' ));
        Email::create(array( 'address'=>'drabunzel@yahoo.com' ));
        Email::create(array( 'address'=>'hematologiahospitalrossi@hotmail.com' ));
        Email::create(array( 'address'=>'biolmol_ludovica@hotmail.com' ));
        Email::create(array( 'address'=>'sebastianisnardi@hotmail.com' ));
        Email::create(array( 'address'=>'spplatensehh@gmail.com' ));
        */
    }
}

class PictureTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('pictures')->delete();

        Picture::create(
            array(
                'path'=>'cuestionario1.png',
                'question_id'=>4
            )
        );

        Picture::create(
            array(
                'path'=>'cuestionario2.png',
                'question_id'=>4
            )
        );

        Picture::create(
            array(
                'path'=>'cuestionario3.png',
                'question_id'=>4
            )
        );

        Picture::create(
            array(
                'path'=>'cuestionario4.png',
                'question_id'=>4
            )
        );

        Picture::create(
            array(
                'path'=>'cuestionario5.png',
                'question_id'=>4
            )
        );
    }
}

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        User::create(
        array(
            'name'=>'elagu',
            'email'=>'agustin@s.com',
            'password' => bcrypt("123456")
        )
    );
        User::create(
        array(
            'name'=>'leito',
            'email'=>'leito@s.com',
            'password' => bcrypt("123456")
        )
    );

    }
}
