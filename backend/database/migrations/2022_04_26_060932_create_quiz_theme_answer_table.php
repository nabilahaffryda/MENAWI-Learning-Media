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
            $table->integer('theme_question_id')->unsigned();
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
