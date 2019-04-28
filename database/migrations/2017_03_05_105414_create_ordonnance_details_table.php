<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdonnanceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordonnance_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medicament_id');
            $table->integer('ordonnance_id');
            $table->string('prise');
            $table->string('quantite');
            $table->string('periode');
            $table->string('quand');
            $table->integer('nombre_par_jour');
            $table->string('remarque');
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
        Schema::dropIfExists('ordonnance_details');
    }
}
