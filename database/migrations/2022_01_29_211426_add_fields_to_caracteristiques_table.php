<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCaracteristiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('caracteristiques', function (Blueprint $table) {
            /*$table->boolean('demande_valeur')->default(0);
            $table->unsignedBigInteger('type_caracteristique_id');
            $table->string('unite')->nullable();

            $table->foreign('type_caracteristique_id')
                ->references('id')
                ->on('type_caracteristiques')
                ->onDelete('restrict');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('caracteristiques', function (Blueprint $table) {
            //
        });
    }
}
