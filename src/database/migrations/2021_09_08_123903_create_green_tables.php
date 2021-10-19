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
            $table->string('sku', 64)->default('');
            $table->string('image', 255)->nullable();
            $table->integer('sort_order')->default(0);
            $table->date('date_available')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
        Schema::create('product_description', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->integer('language_id');
            $table->string('name', 255);
            $table->text('description');

            $table->index('language_id');
            $table->foreign('product_id')->references('product_id')->on('product')->onDelete('cascade');
        });
        Schema::create('product_image', function (Blueprint $table) {
            $table->bigIncrements('product_image_id');
            $table->unsignedBigInteger('product_id');
            $table->string('image', 255);
            $table->integer('sort_order');
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
        Schema::create('product_to_category', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');

            $table->primary(['product_id', 'category_id']);
        });



        Schema::create('rcp', function (Blueprint $table) {
            $table->unsignedBigInteger('rcp_id');
            $table->string('rcp_version', 16);
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            $table->primary(['rcp_id', 'rcp_version']);
            $table->foreign('product_id')->references('product_id')->on('product')->onDelete('cascade');
        });
        Schema::create('option', function (Blueprint $table) {
            $table->bigIncrements('option_id');
            $table->string('type', 32);
            $table->integer('sort_order');
        });
        Schema::create('rcp_option', function (Blueprint $table) {
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
        Schema::dropIfExists('product_description');
        Schema::dropIfExists('product_image');
        Schema::dropIfExists('category');
        Schema::dropIfExists('category_description');
    }
}
