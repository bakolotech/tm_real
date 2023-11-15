<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_configs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('email_notification')->default(0);
            $table->boolean('bureau_notification')->default(0);
            $table->boolean('achat_notification')->default(0);
            $table->boolean('livraison_notification')->default(0);
            $table->boolean('promotion_notification')->default(0);
            $table->boolean('message_notification')->default(0);
            $table->boolean('panier_plein_notification')->default(0);
            $table->boolean('newslatter_notification')->default(0);
            $table->boolean('deleted')->default(0);
            $table->boolean('archived')->default(0);
            $table->boolean('locked')->default(0);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('notification_configs');
    }
}
