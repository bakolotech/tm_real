<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristiques', function (Blueprint $table) {
            $table->id();

            $table->string('libelle');
            $table->boolean('demander_valeur')->default(0);
            $table->enum('type_caracteristique', ['affichage', 'parametre', 'vente'])->default('parametre');
            $table->enum('type_valeur', ['number', 'text', 'bool', 'date', 'time'])->default('text');

            $table->text('description')->nullable();
            $table->boolean('deleted')->default(0);
            $table->boolean('archived')->default(0);
            $table->boolean('locked')->default(0);

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
        Schema::dropIfExists('caracteristiques');
    }
}
