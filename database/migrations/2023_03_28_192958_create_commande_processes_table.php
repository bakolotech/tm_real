<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_processes', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('order_status')->nullable()->default(NULL);
            $table->string('step_hour')->nullable()->default(NULL);
            $table->string('step_date')->nullable()->default(NULL);
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
        Schema::dropIfExists('commande_processes');
    }
}
