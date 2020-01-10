<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    protected $fillable = [
        'product_image', 'category_id', 'brand_id', 'product_name', 'product_quantity', 'product_price',
        'publication_status', 'full_description', 'short_description'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function subImage()
    // {
    //     return $this->belongsTo(Sub_image::class);
    // }
}
