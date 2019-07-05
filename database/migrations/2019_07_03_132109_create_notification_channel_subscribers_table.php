<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationChannelSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_channel_subscribers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('notification_channel_id');
            $table->dateTime('subscribed_at')->nullable();
            $table->dateTime('unsubscribed_at')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('notification_channel_id')->references('id')->on('notification_channels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_channel_subscribers');
    }
}
