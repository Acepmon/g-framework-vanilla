<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 191);
            $table->string('description', 255);
            $table->string('type', 50)->nullable();
        });

        Schema::create('user_permission', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('permission_id');
            $table->boolean('is_granted');

            $table->foreign('permission_id')->references('id')->on('permissions');
        });

        Schema::create('group_permission', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('permission_id');
            $table->boolean('is_granted')->default(false);

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
        Schema::dropIfExists('group_permission');
        Schema::dropIfExists('user_permission');
        Schema::dropIfExists('permissions');
    }
}
