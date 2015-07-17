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
            $table->text('answer');
            // FK to survey_respondents
            $table->integer('survey_respondent_id')->unsigned();
            $table->foreign('survey_respondent_id')->references('id')->on("survey_respondents");
            // FK to survey
            $table->integer('survey_id')->unsigned();
            $table->foreign('survey_id')->references('id')->on("surveys");
            // FK to MultipleChoiceOption
            $table->integer("multiple_choice_option_id")->unsigned()->null();
            $table->foreign("multiple_choice_option_id")->references("id")->on("multiple_choice_options");
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
