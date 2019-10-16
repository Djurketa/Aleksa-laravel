<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Image;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
   return [
   		
   		'article_id'=>$faker->numberBetween(1,100),
        'name' => $faker->image('public/image',400,300, null, false),
    ];
});
