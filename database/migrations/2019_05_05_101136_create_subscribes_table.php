<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Subscribe;
class CreateSubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('shipping_cost');
            $table->unsignedInteger('meal_cost');
            $table->unsignedInteger('total_cost');
            $table->unsignedInteger('no_meals');
            $table->unsignedInteger('ordered')->default(Subscribe::ZERO);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('plan_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('subscribes');
    }
}
