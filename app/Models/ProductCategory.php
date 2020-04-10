<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable=[
        'title',
        'slug',
        'description'
    ];

    public function products(){
        return $this->hasMany(ProductItem::class, 'category_id');
    }
}
