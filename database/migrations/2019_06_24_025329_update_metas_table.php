<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::disableForeignKeyConstraints();
        Schema::table('content_metas', function(Blueprint $table) {
            $table->dropUnique('content_metas_key_unique');
            $table->longText('value')->change();
        });
        Schema::table('term_metas', function(Blueprint $table) {
            $table->dropUnique('term_metas_key_unique');
            $table->longText('value')->change();
        });
        Schema::table('group_metas', function(Blueprint $table) {
            // $table->dropUnique('group_metas_key_unique');
            $table->longText('value')->change();
        });
        Schema::table('comment_metas', function(Blueprint $table) {
            $table->dropUnique('comment_metas_key_unique');
            $table->longText('value')->change();
        });
        Schema::table('settings', function(Blueprint $table) {
            $table->dropUnique('settings_key_unique');
            $table->longText('value')->change();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('content_metas', function(Blueprint $table) {
            $table->unique('key');
            $table->string('value', 255)->change();
        });
        Schema::table('term_metas', function(Blueprint $table) {
            $table->unique('key');
            $table->string('value', 255)->change();
        });
        Schema::table('group_metas', function(Blueprint $table) {
            // $table->unique('key');
            $table->string('value', 255)->change();
        });
        Schema::table('comment_metas', function(Blueprint $table) {
            $table->unique('key');
            $table->string('value', 255)->change();
        });
        Schema::table('settings', function(Blueprint $table) {
            $table->unique('key');
            $table->string('value', 255)->change();
        });
    }
}
