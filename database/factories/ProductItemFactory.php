<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\ProductItem::class, function (Faker $faker) {
    $title=$faker->sentence(rand(3,8), true);
    $txt = $faker->realText(rand(1000,4000));
    $isPublished = rand(1,4) > 1;
    $createdAt=$faker->dateTimeBetween('-3 months', '-2 months');

    $data= [
        'category_id' =>rand(1,11),
        'title'=>$title,
        'slug'=>Str::slug($title),
        'price'=>rand(20,900),
        'excerpt'=>$faker->text(rand(40,100)),
        'title_image'=>'yenyi.jpg',
        'content_raw'=>$txt,
        'is_published'=>$isPublished,
        'published_at'=>$isPublished ? $faker->dateTimeBetween('-2 months', '-1 day') : null ,
        'created_at'=> $createdAt,
        'updated_at'=> $createdAt,
    ];
    return $data;
});
