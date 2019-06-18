<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListeInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liste_invite', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nom');
            $table->String('prenom');
            $table->String('email');
            $table->bigInteger('idcouple')->unsigned();
            $table->foreign('idcouple')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('liste_invite');
    }
}
