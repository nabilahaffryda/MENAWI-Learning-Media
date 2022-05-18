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
        Schema::create('quiz_theme', function (Blueprint $table) {
            $table->id('theme_id');
            $table->string('theme_name');
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('level_id')->on('quiz_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_theme');
    }
};
