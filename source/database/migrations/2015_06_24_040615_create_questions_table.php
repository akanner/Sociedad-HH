<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->text("description");
            // FK to questionnaires
            $table->integer("questionnaire_id")->unsigned();
            $table->foreign("questionnaire_id")->references("id")->on("questionnaires");
            // field used to store the multiple selection questions possible answers
            $table->text("multiple_selection_answers")->nullable();
            // field used to find the class of the question, this table represents a single table hierarchy
            $table->string('class_name')->index();
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
        Schema::drop('questions');
    }
}
