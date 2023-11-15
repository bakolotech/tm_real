<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoutiqueProduitCaracteristiqueValeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boutique_produit_caracteristique_valeurs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_boutiqueProduitCaracteristique');
            $table->string('libelle');
            $table->timestamps();

            $table->foreign('id_boutiqueProduitCaracteristique')
            ->references('boutique_produit_caracteristiques')
            ->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boutique_produit_caracteristique_valeurs');
    }
}
