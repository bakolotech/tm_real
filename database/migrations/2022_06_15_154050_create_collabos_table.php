<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollabosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collabos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_boutique')->nullable();
            $table->string('mail_collabo', 255)->nullable();
            $table->string('mail_sender', 255)->nullable();
            $table->string('role_collabo', 255)->nullable();
            $table->string('statut_collabo', 255)->nullable();
            $table->string('authentification', 255)->nullable();
            $table->string('description_collabo', 255)->nullable();
            $table->timestamps();
            $table->engine="InnoDB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collabos');
    }
}
