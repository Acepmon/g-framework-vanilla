<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->longText('content');
            $table->string('type', 50);
            $table->unsignedBigInteger('author_id');
            $table->string('author_ip', 50);
            $table->string('author_name', 100);
            $table->string('author_email', 191);
            $table->string('author_avatar', 255);
            $table->string('author_user_agent', 255);
            $table->morphs('commentable');
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('comments');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::create('comment_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('comment_id');
            $table->string('key');
            $table->longText('value');

            $table->foreign('comment_id')->references('id')->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_metas');
        Schema::dropIfExists('comments');
    }
}
