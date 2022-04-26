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
            $table->id('theme_question_id');
            $table->text('question');
            $table->integer('question_point');
            $table->binary('question_pict');
            $table->integer('theme_id')->unsigned();
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
