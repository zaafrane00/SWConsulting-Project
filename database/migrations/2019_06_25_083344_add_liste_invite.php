<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddListeInvite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('liste_invite', function (Blueprint $table) {
        $table->bigInteger('idcouple')->unsigned();
           $table->foreign('idcouple')->references('id')->on('users')->onDelete('cascade');
    
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {  Schema::table('liste_invite', function (Blueprint $table) {
        $table->dropColumn('idcouple');
    });
    }
}
