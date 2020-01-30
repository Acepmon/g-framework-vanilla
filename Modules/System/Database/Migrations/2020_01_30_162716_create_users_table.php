<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username', 191);
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 191);
            $table->string('name', 100)->nullable();
            $table->string('avatar', 250)->nullable();
            $table->string('language', 2);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->string('social_id')->nullable();
            $table->string('social_provider')->nullable();
            $table->string('social_token')->nullable();
        });

        Schema::create('user_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('key');
            $table->longText('value');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_metas');
        Schema::dropIfExists('users');
    }
}
