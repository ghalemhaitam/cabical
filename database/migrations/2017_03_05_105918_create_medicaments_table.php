<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //https://www.data.gouv.fr/storage/f/2013-11-28T11%3A43%3A25.672Z/medicaments.json   link for medicament France

        Schema::create('medicaments', function (Blueprint $table) {

            $table->increments('id');
            $table->bigInteger('code');
            $table->string('nom');
            $table->integer('dci1');
            $table->integer('dosage1');
            $table->integer('unite_dosage1');
            $table->integer('forme');
            $table->integer('presentation');
            $table->integer('ppv');
            $table->integer('ph');
            $table->integer('prix_br');
            $table->integer('princeps_generique');
            $table->integer('taux_remboursement');
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
        Schema::dropIfExists('medicaments');
    }
}
