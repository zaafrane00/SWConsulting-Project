<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLigneInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('icon');
            $table->string('contenu');
            $table->bigInteger('id_prestataire')->unsigned();
            $table->foreign('id_prestataire')->references('id_prestataire')->on('prestataire')->onDelete('cascade');
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
        Schema::dropIfExists('ligne_informations');
    }
}
