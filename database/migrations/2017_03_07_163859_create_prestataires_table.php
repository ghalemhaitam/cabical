<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestatairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestataires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('email')->default(" ");
            $table->integer('tel')->default("0");
            $table->string('adresse')->default(" ");
            $table->string('ville')->default(" ");
            $table->timestamps();

     /*       \App\Prestataire::create(['nom'=> 'DR HACHEMI']);
            \App\Prestataire::create(['nom'=> 'DR SAKAT']);
*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestataires');
    }
}
