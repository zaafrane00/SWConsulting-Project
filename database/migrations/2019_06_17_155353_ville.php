<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ville extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ville', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nom');
            $table->bigInteger('idpays')->unsigned();
            $table->foreign('idpays')->references('id')->on('pays')->onDelete('cascade');
            $table->bigInteger('idgev')->unsigned();
            $table->foreign('idgev')->references('id')->on('gouvernement')->onDelete('cascade');

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
        Schema::dropIfExists('ville');
    }
}
