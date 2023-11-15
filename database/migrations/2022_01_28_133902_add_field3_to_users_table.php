<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddField3ToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('pays_id')->nullable();
            $table->unsignedMediumInteger('state_id')->nullable();
            $table->unsignedBigInteger('devise_id')->nullable();
            $table->unsignedBigInteger('langue_id')->nullable();
            $table->unsignedMediumInteger('city_id')->nullable();

            $table->foreign('pays_id')->references('id')->on('pays')->onDelete('restrict');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('restrict');
            $table->foreign('devise_id')->references('id')->on('devises')->onDelete('restrict');
            $table->foreign('langue_id')->references('id')->on('langues')->onDelete('restrict');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
