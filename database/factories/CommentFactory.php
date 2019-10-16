<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
	return [
		'user_id'=>$faker->numberBetween(1,15),
		'article_id'=>$faker->numberBetween(1,50),
		'text'=>$faker->sentence(8,15),
	];
});
