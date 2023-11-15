<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRayonCaracteristiqueValeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rayon_caracteristique_valeurs', function (Blueprint $table) {
            $table->id();
            $table->integer('rayon_id');
            $table->integer('caracteristique_id');
            $table->integer('valeur_id');
            $table->boolean('deleted')->default(false);
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
        Schema::dropIfExists('rayon_caracteristique_valeurs');
    }
}
