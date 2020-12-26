<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moons', function (Blueprint $table) {
            $table->id('id');
            // https://stackoverflow.com/questions/22615926/migration-cannot-add-foreign-key-constraint
            // enforce foreign key constraint and cascade constriants upon deletion of the planet
            $table->foreignId('planet_id')->references('id')->on('planets')->onDelete('cascade');
            $table->string('name');
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
        Schema::dropIfExists('moons');
    }
}
