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
            $table->text('rcp_description')->nullable();
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
            $table->bigIncrements('rcp_option_id');
            $table->unsignedBigInteger('rcp_id');
            $table->string('rcp_version', 16);
            $table->unsignedBigInteger('option_id');
            $table->string('name', 255);
            $table->string('tag_name', 255);
            $table->string('value', 255);
            $table->boolean('required')->default(1);

            $table->foreign('rcp_id')->references('rcp_id')->on('rcp')->onDelete('cascade');
            $table->foreign('option_id')->references('option_id')->on('option')->onDelete('cascade');
        });



        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('itemid');
            $table->string('name', 255)->default('');
            $table->string('key_', 2048)->default('');
            $table->string('delay', 1024)->default(0);
            $table->string('history', 255)->default(0);
            $table->integer('value_type')->default(0);
            $table->integer('status')->default(0);
            $table->string('units', 255)->default('');   // препроцесор обработки (локализированный??? англ, укр, рус)
            $table->uuid('uuid');
        });
        Schema::create('items_value_type', function (Blueprint $table) {
            $table->unsignedBigInteger('value_typeid');
            $table->string('name', 32);
        });
        Schema::create('history', function (Blueprint $table) {
            $table->unsignedBigInteger('itemid')->index();
            $table->integer('clock')->index()->default(0);
            $table->double('value')->default(0);
            // $table->integer('ns')->default(0);
        });
        Schema::create('history_str', function (Blueprint $table) {
            $table->unsignedBigInteger('itemid')->index();
            $table->integer('clock')->index()->default(0);
            $table->string('value', 255)->default(0);
            // $table->integer('ns')->default(0);
        });
        Schema::create('history_text', function (Blueprint $table) {
            $table->unsignedBigInteger('itemid')->index();
            $table->integer('clock')->index()->default(0);
            $table->text('value');
            // $table->integer('ns')->default(0);
        });
        Schema::create('history_uint', function (Blueprint $table) {
            $table->unsignedBigInteger('itemid')->index();
            $table->integer('clock')->index()->default(0);
            $table->unsignedBigInteger('value')->default(0);
            // $table->integer('ns')->default(0);
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
