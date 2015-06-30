<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string("description");
            //FK to surveys
            $table->integer("survey_id")->unsigned();
            $table->foreign("survey_id")->references("id")->on("surveys");
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
        Schema::drop('text_questions');
    }
}
