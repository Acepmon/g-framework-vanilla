<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 191);
            $table->text('description', 255)->nullable();
            $table->morphs('triggerable');
            $table->string('trigger');
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
        Schema::dropIfExists('notification_events');
    }
}
