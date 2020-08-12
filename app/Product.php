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

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'product_tags', 'product_id', 'tag_id')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    
}
