<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->String('date mariage');
            $table->String('image');
            $table->bigInteger('idville')->unsigned();
            $table->foreign('idville')->references('id')->on('ville')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('date mariage');
                $table->dropColumn('image');
                $table->dropColumn('idville');
            });
        }
    }
}
