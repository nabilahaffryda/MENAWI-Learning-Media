<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_theme_answer', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('question_id')->on('quiz_theme_question');
            $table->id('answer_id');
            $table->text('answer');
            $table->string('answer_status');
            $table->binary('answer_pict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_theme_answer');
    }
};
