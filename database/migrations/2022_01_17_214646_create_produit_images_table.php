<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_images', function (Blueprint $table) {
            $table->id();

            $table->string('image');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('produit_images');
    }
}
