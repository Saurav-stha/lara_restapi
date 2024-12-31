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
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('seller_id')->nullable()->change();
            $table->foreignId('category_id')->nullable()->change();
            $table->foreignId('brand_id')->nullable()->change();
            $table->text('short_description')->nullable()->change();
            $table->string('slug')->nullable()->change();
            $table->string('unit')->nullable()->change();
            $table->integer('moq')->nullable()->change();
            $table->smallInteger('moq_status')->nullable()->change();
            $table->integer('quantity')->nullable()->change();
            $table->integer('threshold')->nullable()->change();
            $table->string('image')->nullable()->change();
            $table->string('public_id')->nullable()->change();
            $table->boolean('best_seller_product')->default(false)->nullable()->change();
            $table->boolean('on_sale_product')->default(false)->nullable()->change();
            $table->smallInteger('is_wholesale')->nullable()->change();
            $table->integer('wholesale_quantity')->nullable()->change();
            $table->smallInteger('status')->nullable()->change();
            $table->tinyInteger('is_special')->nullable()->change();
            $table->tinyInteger('is_featured')->nullable()->change();
            $table->double('price1')->nullable()->change();
            $table->double('price2')->nullable()->change();
            $table->smallInteger('featured')->nullable()->change();
            $table->integer('special')->nullable()->change();
            $table->integer('verification')->nullable()->change();
            $table->string('country_of_origin', 191)->nullable()->change();
            $table->longText('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
