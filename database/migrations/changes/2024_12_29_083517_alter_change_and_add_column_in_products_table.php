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
            // First rename existing columns if needed
            $table->renameColumn('name', 'title');

            // Add all new columns
            $table->foreignId('seller_id')->after('id');
            $table->foreignId('category_id')->after('seller_id');
            $table->foreignId('brand_id')->after('category_id');
            $table->text('short_description')->after('description');
            $table->string('slug')->after('short_description');
            $table->string('unit')->after('slug');
            $table->double('weight')->nullable()->after('unit');
            $table->double('volume')->nullable()->after('weight');
            $table->integer('moq')->after('volume');
            $table->smallInteger('moq_status')->after('moq');
            $table->integer('quantity')->after('moq_status');
            $table->integer('threshold')->after('quantity');
            $table->longText('specification')->nullable()->after('threshold');
            $table->string('image')->after('specification');
            $table->string('video')->nullable()->after('image');
            $table->string('video_public_id')->nullable()->after('video');
            $table->double('discount')->nullable()->after('video_public_id');
            $table->string('public_id')->after('discount');
            $table->boolean('best_seller_product')->default(false)->after('public_id');
            $table->boolean('on_sale_product')->default(false)->after('best_seller_product');
            $table->string('charge_id', 11)->nullable()->after('on_sale_product');
            $table->smallInteger('is_wholesale')->after('charge_id');
            $table->double('wholesale_price')->nullable()->after('is_wholesale');
            $table->integer('wholesale_quantity')->after('wholesale_price');
            $table->smallInteger('status')->after('wholesale_quantity');
            $table->tinyInteger('is_special')->after('status');
            $table->tinyInteger('is_featured')->after('is_special');
            $table->double('price1')->after('is_featured');
            $table->double('price2')->after('price1');
            $table->smallInteger('featured')->after('price2');
            $table->integer('special')->after('featured');
            $table->longText('tags')->nullable()->after('special');
            $table->integer('verification')->after('tags');
            $table->string('country_of_origin', 191)->after('verification');

            $table->longText('description')->change();
            
            $table->dropColumn('price');
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
