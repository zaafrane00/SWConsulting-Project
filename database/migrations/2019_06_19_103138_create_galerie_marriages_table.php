<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalerieMarriagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galerie_marriages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('image');
            $table->String('video');
            $table->BigInteger('id_marriage')->unsigned();
            $table->foreign('id_marriage')->references('id')->on('marriage')->onDelete('cascade');
            $table->BigInteger('id_photograph')->unsigned();
            $table->foreign('id_photograph')->references('id_prestataire')->on('prestataire')->onDelete('cascade');
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
        Schema::dropIfExists('galerie_marriages');
    }
}
