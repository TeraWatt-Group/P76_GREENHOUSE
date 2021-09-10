<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGreenTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('name', 255);
            $table->string('sku', 64);
            $table->date('date_available')->default('0000-00-00');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('category_id');
            $table->integer('parent_id')->default(0);
            $table->timestamps();
        });
        Schema::create('category_description', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->string('name', 255);
            $table->text('description');

            $table->foreign('category_id')->references('category_id')->on('category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
        Schema::dropIfExists('category');
    }
}
