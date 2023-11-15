<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFamilleIdIdToSousCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sous_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('famille_id');
            $table->foreign('famille_id')->references('id')->on('familles')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sous_categories', function (Blueprint $table) {
            //
        });
    }
}
