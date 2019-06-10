<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('menu_role', function (Blueprint $table) {
        //     $table->unsignedBigInteger('menu_id');
        //     $table->unsignedBigInteger('role_id');

        //     $table->foreign('menu_id')->references('id')->on('menus');
        //     $table->foreign('role_id')->references('id')->on('roles');
        // });

        Schema::dropIfExists('menu_role');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_role');
    }
}
