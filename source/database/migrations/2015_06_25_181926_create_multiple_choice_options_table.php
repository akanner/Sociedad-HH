<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultipleChoiceOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_choice_options', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->boolean('is_other_option')->default(FALSE);
            $table->boolean('correct_answer') ->default(FALSE);
            //FK to MultipleChoiceQuestion
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
        Schema::drop('multiple_choice_options');
    }
}
