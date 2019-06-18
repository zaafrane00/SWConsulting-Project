<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liste_promotion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('valeur');
            $table->String('description');
            $table->date('datedebut');
            $table->date('datefin');
            $table->bigInteger('idprestataire')->unsigned();
            $table->foreign('idprestataire')->references('id_prestataire')->on('prestataire')->onDelete('cascade');
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
        Schema::dropIfExists('liste_promotion');
    }
}
