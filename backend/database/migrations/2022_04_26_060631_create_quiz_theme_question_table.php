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
        Schema::create('quiz_theme_question', function (Blueprint $table) {
            $table->id('question_id');
            $table->text('question');
            $table->integer('question_point');
            $table->binary('question_pict');
            $table->unsignedBigInteger('theme_id');
            $table->foreign('theme_id')->references('theme_id')->on('quiz_theme');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_theme_question');
    }
};
