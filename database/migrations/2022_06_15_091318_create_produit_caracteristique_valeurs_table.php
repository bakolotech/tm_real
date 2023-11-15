<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitCaracteristiqueValeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_caracteristique_valeurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produit');
            $table->string('id_caracteristique_valeur');
            $table->string('valeur');
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
        Schema::dropIfExists('produit_caracteristique_valeurs');
    }
}
