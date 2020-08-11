<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded =[];

    public function product_images()
    {
        return $this->hasMany('App\Product_Image', 'product_id');
    }
}
