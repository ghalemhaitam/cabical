<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeAntecedentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_antecedents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->timestamps();
        });
        $TypeAntecedents1 = \App\TypeAntecedents::create(['nom' => 'Familiaux']);
        $TypeAntecedents2 = \App\TypeAntecedents::create(['nom' => 'Medicaux']);
        $TypeAntecedents3 = \App\TypeAntecedents::create(['nom' => 'Habitudes alcoolo-tabagique']);
        $TypeAntecedents4 = \App\TypeAntecedents::create(['nom' => 'Chirurgicaux,Complications']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_antecedents');
    }
}
