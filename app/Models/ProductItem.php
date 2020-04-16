<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductItem extends Model
{
    use SoftDeletes;



    protected $fillable = [
        'title',
        'description',
        'meta_key',
        'slug',
        'excerpt',
        'price',
        'category_id',
        'content_raw',
//    'image',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
