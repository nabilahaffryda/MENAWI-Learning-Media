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
        Schema::create('question', function (Blueprint $table) {
            $table->id('question_id');
            $table->unsignedBigInteger('theme_id');
            $table->foreign('theme_id')->references('theme_id')->on('theme');
            $table->text('question');
            $table->text('correct_answer');
            $table->text('bank_answer');
            $table->string('question_pict')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question');
    }
};
