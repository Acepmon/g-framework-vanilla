<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->string('title', 191);
            $table->string('subtitle', 255)->nullable();
            $table->string('link', 255)->nullable();
            $table->string('icon', 50)->nullable();
            $table->string('status', 50);
            $table->string('visibility', 50);
            $table->integer('order');
            $table->integer('sublevel');
            $table->dropColumn('name');
            $table->dropColumn('url');
            $table->dropColumn('published');
            $table->dropSoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
