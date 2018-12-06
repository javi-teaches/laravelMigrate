<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
	return [
		'name' => $faker->sentence(3),
		'price' => $faker->randomFloat(2, 100, 999999),
		// 'image' => $faker->imageUrl(320, 240, 'cats') ,
	];
});
