<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBilanConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bilan_consultations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_bilan_consultation_id');
            $table->integer('prestataire_id');
            $table->string('rc');
            $table->bigInteger('consultation_id');

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
        Schema::dropIfExists('bilan_consultations');
    }
}
