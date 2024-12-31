<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'id' => $row[0],
            'seller_id' => $row[1],
            'category_id' => $row[2],
            'brand_id' => $row[3],
            'country_of_origin' => $row[4],
            'description' => $row[5],
            'short_description' => $row[6],
            'slug' => $row[7],
            'unit' => $row[8],
            'weight' => $row[9],
            'volume' => $row[10],
            'moq' => $row[11],
            'moq_status' => $row[12],
            'quantity' => $row[13],
            'threshold' => $row[14],
            'specification' => $row[15],
            'image' => $row[16],
            'video' => $row[17],
            'video_public_id' => $row[18],
            'discount' => $row[19],
            'public_id' => $row[20],
            'best_seller_product' => $row[21],
            'on_sale_product' => $row[22],
            'charge_id' => $row[23],
            'is_wholesale' => $row[24],
            'wholesale_price' => $row[25],
            'wholesale_quantity' => $row[26],
            'status' => $row[27],
            'is_special' => $row[28],
            'is_featured' => $row[29],
            'price1' => $row[30],
            'price2' => $row[31],
            'created_at' => $row[32],
            'updated_at' => $row[33],
            'featured' => $row[34],
            'special' => $row[35],
            'tags' => $row[36],
            'verification' => $row[37],
            'title' => $row[38],
        ]);
    }

}
