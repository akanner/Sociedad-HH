<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultipleSelectionSubquestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_selection_subquestions', function (Blueprint $table) {
            $table->increments('id');
            $table->text("description");

            $table->integer("question_id")->unsigned();
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
        Schema::drop('multiple_selection_subquestions');
    }
}
