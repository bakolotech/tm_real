<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitFamillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_familles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('produit_id');
            $table->unsignedBigInteger('famille_id');

            $table->boolean('deleted')->default(0);
            $table->boolean('archived')->default(0);
            $table->boolean('locked')->default(0);

            $table->timestamps();

            $table->foreign('produit_id')
                ->references('id')
                ->on('produits')
                ->onDelete('restrict');

            $table->foreign('famille_id')
                ->references('id')
                ->on('familles')
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
        Schema::dropIfExists('produit_familles');
    }
}
