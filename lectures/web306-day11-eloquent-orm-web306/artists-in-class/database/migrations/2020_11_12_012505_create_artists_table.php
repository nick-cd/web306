<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * A migration is a file which is generated to create and update tables.
 * 
 * The up() method is used to add new tables and columns to the database while the down() method is used to reverse any actions performed by the up() method.
 */

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id(); // Alias for $table->bigIncrements('id');
            /**
             * The bigIncrements() method should be used to define the primary key. This is because it is an auto incrementing BIGINT type which does not have a alimit which means that our app will not beak if many entries are added to the database. The id() method is a shorthand for this.
             */
            $table->string('name', 255);
            // The string method is used for VARCHAR types and should have a limit set
            $table->string('image', 255);
            $table->text('styles');
            // The text() method is used for TEXT types and does not need a limit.
            $table->integer('series')->nullable();
            // The interger() method is for integers. The nullable() meethod is used to indicate that a column can be NULL and should be used for any fields which are not required.
            $table->integer('works')->nullable();
            $table->bigInteger('bio_id')->unsigned()->nullable();
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
        Schema::dropIfExists('artists');
    }
}
