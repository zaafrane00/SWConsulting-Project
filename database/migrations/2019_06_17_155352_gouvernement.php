<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Gouvernement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gouvernement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nom');
            $table->integer('code_postal');
            $table->bigInteger('idpays')->unsigned();
            $table->foreign('idpays')->references('id')->on('pays')->onDelete('cascade');

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
        Schema::table('gouvernement', function (Blueprint $table) {
            Schema::dropIfExists('gouvernement');
        });
        }
    
}
