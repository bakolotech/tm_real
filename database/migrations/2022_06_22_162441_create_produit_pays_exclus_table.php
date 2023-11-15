<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitPaysExclusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_pays_exclus', function (Blueprint $table) {
            $table->id();
            $table->string('pays');
            $table->text('motif')->nullable();
            $table->boolean('deleted')->default(0);
            $table->boolean('archived')->default(0);
            $table->boolean('locked')->default(0);

            $table->unsignedBigInteger('produit_id');
            $table->timestamps();

            $table->foreign('produit_id')
                 ->references('id')
                 ->on('produits')
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
        Schema::dropIfExists('produit_pays_exclus');
    }
}
