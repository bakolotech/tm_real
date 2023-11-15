<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRayonCaracteristiques extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rayon_caracteristiques', function (Blueprint $table) {
            $table->integer('rayon_id');
            $table->integer('caracteristique_id');
            $table->unique(['rayon_id', 'caracteristique_id']);
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
        Schema::dropIfExists('rayon_caracteristiques');
    }
}
