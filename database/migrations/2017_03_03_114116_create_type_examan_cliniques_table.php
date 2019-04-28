<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeExamanCliniquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_examan_cliniques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->timestamps();
        });
        $TypeExamanClinique1 = \App\TypeExamanClinique::create(['nom' => 'General']);
        $TypeExamanClinique2 = \App\TypeExamanClinique::create(['nom' => 'Par Appareil']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_examan_cliniques');
    }
}
