<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSousCategorieCaracteristiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sous_categorie_caracteristiques', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sous_categorie_id');
            $table->unsignedBigInteger('caracteristique_id');

            $table->text('description')->nullable();

            $table->boolean('deleted')->default(0);
            $table->boolean('archived')->default(0);
            $table->boolean('locked')->default(0);
            $table->timestamps();

            $table->foreign('caracteristique_id')
                ->references('id')
                ->on('caracteristiques')
                ->onDelete('restrict');

            $table->foreign('sous_categorie_id')
                ->references('id')

                ->on('sous_categories')
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
        Schema::dropIfExists('sous_categorie_caracteristiques');
    }
}
