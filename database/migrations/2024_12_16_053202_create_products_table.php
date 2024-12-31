<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seller_id')->unsigned();
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('product_sub_categories_id')->unsigned()->nullable();
            $table->foreign('product_sub_categories_id')->references('id')->on('product_sub_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('unit')->nullable();
            $table->double('weight')->nullable();
            $table->double('volume')->nullable();
            $table->integer('moq')->nullable();
            $table->integer('quantity')->default(0);
            $table->text('specification')->nullable();
            $table->string('image')->nullable();
            $table->text('video')->nullable();
            $table->string('video_public_id')->nullable();
            $table->double('discount')->nullable();
            $table->string('public_id')->nullable();
            $table->json('tags')->nullable();
            $table->integer('verification')->default(2)->comment('1:Verified, 2:Unverified');
            $table->smallInteger('best_seller_product')->default(0)->comment("1: true and 0: false");
            $table->smallInteger('on_sale_product')->default(0)->comment("1: true and 0: false");
            $table->integer('charge_id')->nullable()->comment('1 => chilled 2 => dry');
            $table->smallInteger('is_wholesale')->default(0)->comment("1: true and 0: false");
            $table->double('wholesale_price')->nullable();
            $table->integer('wholesale_quantity')->nullable();
            $table->smallInteger('status')->default(1)->comment("1: active and 0: inactive and -1: out of stock and 2: low on stock");
            $table->integer('featured')->default(0)->nullable()->comment('0 false 1 true');
            $table->integer('special')->default(0)->nullable()->comment('0 false 1 true');
            $table->double('price1')->nullable();
            $table->double('price2')->nullable();
            $table->string('country_of_origin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
