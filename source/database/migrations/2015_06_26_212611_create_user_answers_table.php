<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('answer')->nullable();
            $table->string('class_name');

            // FK to questionnaire_respondents
            $table->integer('questionnaire_respondent_id')->unsigned();
            $table->foreign('questionnaire_respondent_id')->references('id')->on("questionnaire_respondents");

            // FK to questionnaire
            $table->integer('questionnaire_id')->unsigned();
            $table->foreign('questionnaire_id')->references('id')->on("questionnaires");

            // FK to MultipleChoiceOption
            $table->integer("multiple_choice_option_id")->unsigned()->nullable();
            $table->foreign("multiple_choice_option_id")->references("id")->on("multiple_choice_options");

            // FK to MultipleSelectionOption
            $table->integer("multiple_selection_option_id")->unsigned()->nullable();
            $table->foreign("multiple_selection_option_id")->references("id")->on("multiple_selection_options");

            // FK to question
            $table->integer("question_id")->unsigned()->nullable();
            $table->foreign("question_id")->references("id")->on("questions");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      if(Schema::hasTable('user_answers'))
      {
        Schema::drop('user_answers');
      }
    }
}
