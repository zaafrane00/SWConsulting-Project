<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nom_evenement');
            $table->String('type_evenement');
            $table->date('date_debut');
            $table->String('heure_debut');
            $table->String('date_fin');
            $table->String('ville');
            $table->String('addresse');
            $table->String('description_evenement');
            $table->bigInteger('idprestataire')->unsigned();
            $table->foreign('idprestataire')->references('id_prestataire')->on('prestataire')->onDelete('cascade');
            $table->bigInteger('idmarriage')->unsigned();
            $table->foreign('idmarriage')->references('id')->on('marriage')->onDelete('cascade');
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
        Schema::dropIfExists('evenement');
    }
}
