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
        Schema::create('badge', function (Blueprint $table) {
            $table->id('badge_id');
            $table->string('badge_name', 100);
            $table->binary('badge_pict_active');
            $table->binary('badge_pict_non_active');
            $table->integer('badge_point');
            $table->integer('badge_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('badge');
    }
};
