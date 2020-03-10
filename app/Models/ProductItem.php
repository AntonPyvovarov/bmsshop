<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductItem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'price',
        'category_id',
        'content_raw',
//    'image',
    ];

}
