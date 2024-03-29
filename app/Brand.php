<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    protected $fillable=[
        'brand_name','brand_description','publication_status',
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }
}
