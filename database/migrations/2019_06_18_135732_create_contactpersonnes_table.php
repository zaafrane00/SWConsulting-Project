<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactpersonnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactpersonnes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nom');
            $table->String('email');
            $table->String('telephone');
            $table->String('telephoneportable');
            $table->String('telephonefax');
            $table->String('siteinternet');
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
        Schema::dropIfExists('contactpersonnes');
    }
}
