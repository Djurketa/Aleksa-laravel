<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->numberBetween(1,15),
        'title'=>$faker->sentence(2,5),
        'category_id'=>$faker->numberBetween(1,10),
        'description'=>$faker->paragraph,
        'price'=>$faker->numberBetween(1,3000),
        'condition'=>'polovno'
    ];
});
