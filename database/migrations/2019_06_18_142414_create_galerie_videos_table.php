<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalerieVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galerie_video', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('titre');
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
        Schema::dropIfExists('galerie_video');
    }
}
