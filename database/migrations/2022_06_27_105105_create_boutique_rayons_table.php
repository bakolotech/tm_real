<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoutiqueRayonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boutique_rayons', function (Blueprint $table) {
            $table->id();
            $table->integer('rayon_id')->unsigned();
            $table->foreign('rayon_id')->references('id')->on('rayons')
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
        Schema::dropIfExists('boutique_rayons');
    }
}
