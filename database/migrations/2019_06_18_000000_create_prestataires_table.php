<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestatairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestataire', function (Blueprint $table) {
            $table->bigIncrements('id_prestataire'); 
            $table->String('nom');
            $table->String('prenom');
            $table->String('telephone');
            $table->String('email');
            $table->String('password');
            $table->String('description');
            $table->integer('code_postal');
            $table->String('att');
            $table->String('ang');
            $table->bigInteger('idville')->unsigned();
            $table->foreign('idville')->references('id')->on('ville')->onDelete('cascade');
            $table->bigInteger('id_sous_category')->unsigned();
            $table->foreign('id_sous_category')->references('id_sous_categorie')->on('sous__categories')->onDelete('cascade');
            $table->String('tarification');
            $table->integer('isactive');
            $table->integer('isvisibile');
            $table->rememberToken();
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
        Schema::dropIfExists('prestataire');
    }
}
