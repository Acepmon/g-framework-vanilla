<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->timestamps();
            $table->unsignedBigInteger('group_id');
            $table->string('key', 100)->nullable();
            $table->string('value', 255);

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
        Schema::dropIfExists('group_metas');
    }
}
