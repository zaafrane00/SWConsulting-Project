<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSousCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sous__categories', function (Blueprint $table) {
            $table->bigIncrements('id_sous_categorie');
            $table->string('nom');
            $table->bigInteger('id_categorie')->unsigned();
            $table->foreign('id_categorie')->references('id_categories')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('sous__categories');
    }
}
