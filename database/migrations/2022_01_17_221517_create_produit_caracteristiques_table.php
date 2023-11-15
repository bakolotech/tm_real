<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitCaracteristiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_caracteristiques', function (Blueprint $table) {
            $table->id();

            $table->string('valeur')->nullable();
            $table->unsignedBigInteger('produit_id');
            $table->unsignedBigInteger('psc_id');

            $table->boolean('deleted')->default(0);
            $table->boolean('archived')->default(0);
            $table->boolean('locked')->default(0);

            $table->timestamps();

            $table->foreign('produit_id')
                ->references('id')
                ->on('produits')
                ->onDelete('restrict');

            $table->foreign('psc_id')
                ->references('id')
                ->on('produit_sous_caracteristiques')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produit_caracteristiques');
    }
}
