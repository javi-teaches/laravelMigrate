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
		$this->call(ProductsTableSeeder::class);
		$this->call(CategoriesTableSeeder::class);
		$this->call(BrandsTableSeeder::class);
		$this->call(ColorsTableSeeder::class);

		$products = \App\Product::all();
     	$categories = \App\Category::all();
     	$brands = \App\Brand::all();
     	$colors = \App\Color::all();

		foreach ($products as $product) {
			$product->colors()->sync($colors->random(3));

			$product->category()->associate($categories->random(1)->first());
			$product->brand()->associate($brands->random(1)->first());

			$product->save();
		}

		// for ($i = 0; $i < count($products); $i++) {
		// 	$cat = $categories[rand(0,5)];
		// 	$bra = $brands[rand(0,7)];
		// 	$cat->products()->save($products[$i]);
		// 	$bra->products()->save($products[$i]);
		// }

		// $products = factory(App\Product::class)->times(20)->create();
		// $categories = factory(App\Category::class)->times(6)->create();
		// $brands = factory(App\Brand::class)->times(8)->create();
		// $colors = factory(App\Color::class)->times(15)->create();
	}
}
