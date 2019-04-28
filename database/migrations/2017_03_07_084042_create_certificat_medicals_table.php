<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificatMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificat_medicals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_certification_id');
            $table->bigInteger('consultation_id');
            $table->dateTime('de');
            $table->dateTime('a');
            $table->integer('duree_par_jour');
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
        Schema::dropIfExists('certificat_medicals');
    }
}
