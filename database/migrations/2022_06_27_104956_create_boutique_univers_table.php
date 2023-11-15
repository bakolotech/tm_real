<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoutiqueUniversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boutique_univers', function (Blueprint $table) {
            $table->id();
            $table->integer('univers_id')->unsigned();
            $table->foreign('univers_id')->references('id')->on('univers')
            ->onDelete('cascade');
            $table->integer('boutique_id')->references('id')->on('boutiques')
            ->onDelete('cascade');;
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
        Schema::dropIfExists('boutique_univers');
    }
}
