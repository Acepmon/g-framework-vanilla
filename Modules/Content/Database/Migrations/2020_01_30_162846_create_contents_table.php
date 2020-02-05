<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->string('type');
            $table->string('status');
            $table->string('visibility');
            $table->unsignedBigInteger('author_id');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::create('contents_meta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('content_id');
            $table->string('key');
            $table->longText('value');

            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
            $table->index(['key']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents_meta');
        Schema::dropIfExists('contents');
    }
}
