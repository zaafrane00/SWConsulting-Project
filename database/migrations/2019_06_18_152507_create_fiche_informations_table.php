<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFicheInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiche_informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_sous_categorie')->unsigned();
            $table->foreign('id_sous_categorie')->references('id_sous_categorie')->on('sous__categories')->onDelete('cascade');
            $table->string('nom');            
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
        Schema::dropIfExists('fiche_informations');
    }
}
