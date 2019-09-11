<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnsFromMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('status');
            $table->dropColumn('visibility');
            $table->dropColumn('subtitle');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            //
        });
    }
}
