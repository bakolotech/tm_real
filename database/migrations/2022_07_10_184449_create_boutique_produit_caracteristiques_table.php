<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoutiqueProduitCaracteristiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boutique_produit_caracteristiques', function (Blueprint $table) {
            $table->id();
            $table->integer('id_produit');
            $table->integer('id_boutique');
            $table->string('libelle');
            $table->timestamps();

            $table->foreign('id_produit')
            ->references('id')
            ->on('produit')
            ->delete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boutique_produit_caracteristiques');
    }
}
