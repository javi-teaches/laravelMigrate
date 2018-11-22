<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	* Seed the application's database.
	*
	* @return void
	*/
	public function run()
	{
		// $this->call(UsersTableSeeder::class);

		$products = factory(App\Product::class)->times(20)->create();
		$categories = factory(App\Category::class)->times(6)->create();
		$brands = factory(App\Brand::class)->times(8)->create();
		$colors = factory(App\Color::class)->times(15)->create();

		foreach ($products as $product) {
			$product->colors()->sync($colors->random(3));
			// $product->category()->save($categories->random(1));
			// $product->brand()->save($brands->random(1));
		}

		for ($i = 0; $i < count($products); $i++) {
			$cat = $categories[rand(0,5)];
			$bra = $brands[rand(0,7)];
			$cat->products()->save($products[$i]);
			$bra->products()->save($products[$i]);
		}
	}
}
