<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlergen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alergen', function (Blueprint $table) {
            $table->unsignedinteger('alergen_id');
            $table->string('alergen_name');
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('datumy', function (Blueprint $table) {
            $table->increments('id');
            $table->date('datum');
            $table->unsignedinteger('food_id');
            $table->timestamps();
        });

        Schema::create('food', function (Blueprint $table) {
            $table->unsignedinteger('food_id');
            $table->string('food_name');
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('pivot_alergen_food', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('food_id');
            $table->unsignedinteger('alergen_id');
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
        Schema::dropIfExists('alergen');
    }
}
