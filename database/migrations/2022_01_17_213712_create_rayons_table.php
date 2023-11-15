<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRayonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rayons', function (Blueprint $table) {
            $table->id();

            $table->string('libelle');
            $table->string('petite_etagere');
            $table->string('grande_etagere');

            $table->text('description')->nullable();

            $table->unsignedBigInteger('univer_id');

            $table->boolean('deleted')->default(0);
            $table->boolean('archived')->default(0);
            $table->boolean('locked')->default(0);
            $table->timestamps();

            $table->foreign('univer_id')
                ->references('id')
                ->on('univers')
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
        Schema::dropIfExists('rayons');
    }
}
