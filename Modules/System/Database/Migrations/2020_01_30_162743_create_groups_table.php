<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('title');
            $table->string('description', 255)->nullable();
            $table->string('type', 50);

            $table->foreign('parent_id')->references('id')->on('groups');
        });

        Schema::create('groups_meta', function (Blueprint $table) {
            // Identifier
            $table->bigIncrements('id');

            // Relationships
            $table->unsignedBigInteger('group_id')->index();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');

            // Main Fields
            $table->string('type')->default('null');
            $table->string('key')->index();
            $table->text('value')->nullable();

            // Logs
            $table->timestamps();
        });

        Schema::create('user_group', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('group_id');

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_group');
        Schema::dropIfExists('groups_meta');
        Schema::dropIfExists('groups');
    }
}
