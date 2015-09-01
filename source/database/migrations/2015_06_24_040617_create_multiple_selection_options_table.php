<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultipleSelectionOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_selection_options', function (Blueprint $table) {
            $table->increments('id');
            $table->text("description");

            $table->integer("subquestion_id")->unsigned();
            $table->foreign("subquestion_id")->references("id")->on("multiple_selection_subquestions");

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
        Schema::drop('multiple_selection_options');
    }
}
