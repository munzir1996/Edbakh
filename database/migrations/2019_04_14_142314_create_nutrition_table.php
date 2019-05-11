<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNutritionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrition', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fats');
            $table->unsignedInteger('saturated_fats');
            $table->unsignedInteger('carbohydrate');
            $table->unsignedInteger('sugar');
            $table->unsignedInteger('dietary_fiber');
            $table->unsignedInteger('protein');
            $table->unsignedInteger('cholestrol');
            $table->unsignedInteger('sodium');
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
        Schema::dropIfExists('nutrition');
    }
}
