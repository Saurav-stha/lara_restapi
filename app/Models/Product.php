<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'seller_id',
        'category_id',
        'brand_id',
        'title',
        'description',
        'short_description',
        'slug',
        'unit',
        'weight',
        'volume',
        'moq',
        'moq_status',
        'quantity',
        'threshold',
        'specification',
        'image',
        'video',
        'video_public_id',
        'discount',
        'public_id',
        'best_seller_product',
        'on_sale_product',
        'charge_id',
        'is_wholesale',
        'wholesale_price',
        'wholesale_quantity',
        'status',
        'is_special',
        'is_featured',
        'price1',
        'price2',
        'featured',
        'special',
        'tags',
        'verification',
        'country_of_origin',
    ];
}
