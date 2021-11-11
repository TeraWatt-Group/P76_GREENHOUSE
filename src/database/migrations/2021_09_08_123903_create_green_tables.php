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
            $table->text('description')->nullable();

            $table->index('language_id');
            $table->foreign('product_id')->references('product_id')->on('product')->onDelete('cascade');
        });
        Schema::create('product_image', function (Blueprint $table) {
            $table->bigIncrements('product_image_id');
            $table->unsignedBigInteger('product_id');
            $table->string('image', 255);
            $table->integer('sort_order')->default(0);
        });
        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('category_id');
            $table->integer('parent_id')->default(0);
            $table->timestamps();
        });
        Schema::create('category_description', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->string('name', 255);
            $table->text('description')->nullable();

            $table->foreign('category_id')->references('category_id')->on('category')->onDelete('cascade');
        });
        Schema::create('product_to_category', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');

            $table->primary(['product_id', 'category_id']);
        });


        Schema::create('equipments', function (Blueprint $table) {
            $table->bigIncrements('equipmentid');
            $table->string('sku', 64)->default('');
            $table->string('image', 255)->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(0);
        });
        Schema::create('equipments_description', function (Blueprint $table) {
            $table->unsignedBigInteger('equipmentid');
            $table->integer('language_id');
            $table->string('name', 255);
            $table->text('description')->nullable();

            $table->index('language_id');
            $table->foreign('equipmentid')->references('equipmentid')->on('equipments')->onDelete('cascade');
        });
        Schema::create('users_equipments', function (Blueprint $table) {
            $table->bigIncrements('uequipmentid');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('equipmentid');
            $table->boolean('status')->default(0);
            $table->integer('created_at');
            $table->uuid('uuid');

            $table->index(['userid', 'equipmentid']);
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('equipmentid')->references('equipmentid')->on('equipments')->onDelete('cascade');
        });


        Schema::create('rcp', function (Blueprint $table) {
            $table->unsignedBigInteger('rcpid');
            $table->string('rcp_version', 16);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            $table->primary(['rcpid', 'rcp_version']);
            $table->foreign('product_id')->references('product_id')->on('product')->onDelete('cascade');
        });
        Schema::create('option', function (Blueprint $table) {
            $table->bigIncrements('option_id');
            $table->string('type', 32);
            $table->integer('sort_order')->default(0);
        });
        Schema::create('rcp_option', function (Blueprint $table) {
            $table->bigIncrements('rcp_option_id');
            $table->unsignedBigInteger('rcpid');
            $table->string('rcp_version', 16);
            $table->unsignedBigInteger('option_id');
            $table->string('name', 255);
            $table->string('tag_name', 255);
            $table->string('value', 255);
            $table->boolean('required')->default(1);

            $table->foreign('rcpid')->references('rcpid')->on('rcp')->onDelete('cascade');
            $table->foreign('option_id')->references('option_id')->on('option')->onDelete('cascade');
        });



        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('itemid');
            $table->unsignedBigInteger('equipmentid');
            $table->string('name', 255)->default('');
            $table->string('key_', 2048)->default('');
            $table->string('delay', 1024)->default(0);
            $table->string('history', 255)->default(0);
            $table->integer('value_type')->default(0);
            $table->integer('status')->default(0);
            $table->string('units', 255)->default('');   // препроцесор обработки (локализированный??? англ, укр, рус)
            $table->uuid('uuid');

            $table->foreign('equipmentid')->references('equipmentid')->on('equipments')->onDelete('cascade');
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

        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('eventid');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('equipmentid');
            $table->integer('clock')->index()->default(0);
            $table->string('type', 20);
            $table->boolean('status')->nullable();
            $table->string('esc_period', 255)->default('1m');

            $table->index(['userid', 'equipmentid']);
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('equipmentid')->references('equipmentid')->on('equipments')->onDelete('cascade');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('orderid');
            $table->unsignedBigInteger('uequipmentid');
            $table->unsignedBigInteger('rcpid');
            $table->integer('start');
            $table->integer('end');

            $table->boolean('status');

            $table->index(['uequipmentid', 'rcpid']);
            $table->foreign('uequipmentid')->references('uequipmentid')->on('users_equipments')->onDelete('cascade');
            $table->foreign('rcpid')->references('rcpid')->on('rcp')->onDelete('cascade');
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
