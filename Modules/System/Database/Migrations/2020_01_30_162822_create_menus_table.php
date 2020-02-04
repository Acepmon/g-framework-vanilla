<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            // Identifier
            $table->bigIncrements('id');

            // Main Fields
            $table->string('title');
            $table->string('link')->nullable();
            $table->integer('sublevel')->default(1);
            $table->integer('order')->default(1);

            // Secondary Fields
            $table->unsignedBigInteger('parent_id')->nullable();

            // Relationships
            $table->foreign('parent_id')->references('id')->on('menus');
        });

        Schema::create('menus_meta', function (Blueprint $table) {
            // Identifier
            $table->bigIncrements('id');

            // Relationships
            $table->unsignedBigInteger('menu_id')->index();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');

            // Main Fields
            $table->string('type')->default('null');
            $table->string('key')->index();
            $table->text('value')->nullable();

            // Logs
            $table->timestamps();
        });

        Schema::create('group_menu', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('menu_id');

            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_menu');
        Schema::dropIfExists('menus_meta');
        Schema::dropIfExists('menus');
    }
}
