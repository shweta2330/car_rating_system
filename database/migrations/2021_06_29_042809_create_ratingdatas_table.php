<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratingdatas', function (Blueprint $table) {
            
            $table->id();
            $table->integer('user_id');
            $table->integer('car_id');
            $table->integer('mileage')->nullable();
            $table->integer('maintenance_cost')->nullable();
            $table->integer('comfort')->nullable();
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
        Schema::dropIfExists('ratingdatas');
    }
}
