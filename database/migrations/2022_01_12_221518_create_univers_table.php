<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('univers', function (Blueprint $table) {
            $table->id();

            $table->string('libelle');
            $table->string('mini');
            $table->string('background');
            $table->string('logo');

            $table->text('description')->nullable();

            $table->enum('ranger', [1, 2])->default(1);

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
        Schema::dropIfExists('univers');
    }
}
