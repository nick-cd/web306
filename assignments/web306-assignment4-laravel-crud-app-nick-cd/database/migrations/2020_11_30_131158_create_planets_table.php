<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255);
            $table->enum('planet_type', ['T', 'J']);
            $table->double('distance_from_sun', 8, 2);
            $table->double('avg_temp', 8, 2);
            $table->binary('image');
            $table->string('img_type', 32);
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
        Schema::dropIfExists('planets');
    }
}
