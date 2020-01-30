<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermTaxonomyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->unsignedBigInteger('group_id')->nullable();

            $table->foreign('group_id')->references('id')->on('terms');
        });

        Schema::create('term_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('term_id');
            $table->string('key');
            $table->longText('value');

            $table->foreign('term_id')->references('id')->on('terms');
        });

        Schema::create('term_taxonomy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('term_id');
            $table->string('taxonomy');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('count');

            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('terms')->onDelete('cascade');
            $table->index(['taxonomy']);
        });

        Schema::create('term_relationships', function (Blueprint $table) {
            $table->unsignedBigInteger('content_id');
            $table->unsignedBigInteger('term_taxonomy_id');
            $table->integer('order')->nullable();

            $table->foreign('content_id')->references('id')->on('contents');
            $table->foreign('term_taxonomy_id')->references('id')->on('term_taxonomy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('term_relationships');
        Schema::dropIfExists('term_taxonomy');
        Schema::dropIfExists('term_metas');
        Schema::dropIfExists('terms');
    }
}
