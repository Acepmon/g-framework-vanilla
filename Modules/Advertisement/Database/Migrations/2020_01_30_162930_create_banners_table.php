<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
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

        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 191);
            $table->string('banner')->nullable();
            $table->string('link')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->string('status')->default('draft');
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();

            $table->foreign('location_id')->references('id')->on('banner_locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
        Schema::dropIfExists('banner_locations');
    }
}
