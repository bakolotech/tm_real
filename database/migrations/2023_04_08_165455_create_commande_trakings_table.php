<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeTrakingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_trakings', function (Blueprint $table) {
            $table->id();
            $table->string('track_jobId')->nullable()->default(null);
            $table->string('pickup_job_id')->nullable()->default(null);
            $table->string('delivery_job_id')->nullable()->default(null);
            $table->string('order_id')->nullable()->default(null);
            $table->string('tacking_status')->nullable()->default(null);
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
        Schema::dropIfExists('commande_trakings');
    }
}
