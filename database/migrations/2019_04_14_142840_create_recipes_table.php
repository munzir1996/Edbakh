<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ar');
            $table->string('subtitle_ar');
            $table->string('title_en');
            $table->string('subtitle_en');
            $table->text('description_ar');
            $table->text('description_en');
            $table->unsignedInteger('calories');
            $table->unsignedInteger('time');
            $table->unsignedInteger('level');
            $table->unsignedInteger('component_id');
            $table->unsignedInteger('dish_id');
            $table->unsignedInteger('season_id');
            $table->unsignedInteger('plan_id');
            $table->string('picture');
            $table->timestamps();

            $table->foreign('component_id')->references('id')->on('components')->onDelete('cascade');
            $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade');
            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
