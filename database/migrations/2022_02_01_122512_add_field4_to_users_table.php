<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddField4ToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('logout')->default(0);
            $table->string('nom_entreprise')->nullable();
            $table->string('adresse')->nullable();
            $table->string('code_postale')->nullable();
            $table->string('portable')->nullable();
            $table->string('portable2')->nullable();
            $table->string('portable3')->nullable();
            $table->string('email2')->nullable();
            $table->string('email3')->nullable();
            $table->string('date_naissance')->nullable();
            $table->json('google_user')->nullable();
            $table->json('facebook_user')->nullable();
            $table->json('microsoft_user')->nullable();
            $table->json('linkdin_user')->nullable();
            $table->json('twitter_user')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
