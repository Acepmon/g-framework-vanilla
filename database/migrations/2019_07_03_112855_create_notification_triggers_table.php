<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTriggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_triggers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('notification_event_id');
            $table->unsignedBigInteger('notification_channel_id');
            $table->unsignedBigInteger('notification_template_id');
            $table->bigInteger('triggered_count')->default(0);
            $table->dateTime('last_triggered_at')->nullable();
            $table->bigInteger('delay')->default(0);
            $table->string('interval_type', 50); // ONETIME, EVERY, CONDITION
            $table->string('interval_condition', 250)->nullable();
            $table->timestamps();

            $table->foreign('notification_event_id')->references('id')->on('notification_events');
            $table->foreign('notification_channel_id')->references('id')->on('notification_channels');
            $table->foreign('notification_template_id')->references('id')->on('notification_templates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_triggers');
    }
}
