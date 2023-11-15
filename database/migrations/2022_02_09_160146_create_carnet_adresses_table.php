<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarnetAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carnet_adresses', function (Blueprint $table) {
            $table->id();
            $table->string('prenom_nom');
            $table->string('adresse');
            $table->string('complement')->nullable();
            $table->string('ville');
            $table->string('code_postale')->nullable();
            $table->string('type_adresse');
            $table->string('nom_entreprise');
            $table->string('portable');

            $table->boolean('adresse_defaut')->default(1)->nullable();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->references('id')

                ->on('users')
                ->onDelete('restrict');






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
        Schema::dropIfExists('carnet_adresses');
    }
}
