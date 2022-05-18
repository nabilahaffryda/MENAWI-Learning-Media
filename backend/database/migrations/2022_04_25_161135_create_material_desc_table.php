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
        Schema::create('material_desc', function (Blueprint $table) {
            $table->id('desc_id');
            $table->text('description');
            $table->binary('desc_pict');
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('material_id')->on('material');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_desc');
    }
};
