<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);
            $table->string('type')->default('slider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banner_locations');
    }
}
