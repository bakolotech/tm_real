<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->enum('sexe', ['H', 'F'])->nullable();
            $table->string('ville');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('facebook_key')->unique()->nullable();
            $table->string('google_key')->unique()->nullable();
            $table->dateTime('last_login')->useCurrent();
            $table->string('last_ip')->nullable();
            $table->boolean('locked')->default(0);
            $table->boolean('deleted')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
