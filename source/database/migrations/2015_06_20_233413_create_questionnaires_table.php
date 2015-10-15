<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->text('description');
            $table->text('heading');

            $table->date('activeFrom');
            $table->date('activeTo')->nullable();

            $table->text('attachedFilePhysicalName')->nullable();
            $table->text('attachedFileLogicalName')->nullable();

            $table->boolean('active')->default(FALSE);
            $table->boolean('locked')->default(FALSE);

            $table->integer('answersCount')->default(0);

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
        Schema::drop('questionnaires');
    }
}
