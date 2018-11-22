<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
	return [
		'name' => $faker->unique()->randomElement([
			'Electronics',
			'Fashion',
			'Health and beauty',
			'Sports',
			'Home and garden',
			'Deals',
			'Motors',
			'Woman',
			'Men',
			'Boys',
			'Girls',
		])
	];
});
