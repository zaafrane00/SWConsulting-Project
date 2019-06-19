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
            $table->String('telephone');
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
        Schema::dropIfExists('liste_invite');
    }
}
