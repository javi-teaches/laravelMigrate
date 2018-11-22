<?php

use Faker\Generator as Faker;

$factory->define(App\Brand::class, function (Faker $faker) {
	return [
		'name' => $faker->unique()->randomElement([
			'Apple',
			'Samsung',
			'Motorola',
			'Sony',
			'LG',
			'Huawei',
			'HP',
			'Dell',
			'Blackberry',
			'Lenovo',
			'Asus',
			'Bangho',
			'Compact',
			'IBM',
		])
	];
});
