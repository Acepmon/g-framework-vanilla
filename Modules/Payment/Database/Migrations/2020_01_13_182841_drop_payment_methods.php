<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPaymentMethods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('payment_methods');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->string('code', 30)->primary();
            $table->string('name', 191);
            $table->json('data')->nullable();
            $table->boolean('enabled')->default(false);
        });
    }
}
