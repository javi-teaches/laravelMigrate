<?php
use App\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   $products = App\Product::all();

	foreach ($products as $product) {
		echo "<h2>$product->name</h2>";
		echo "<p>{$product->category->name}</p>";
		echo "<p>{$product->brand->name}</p>";
		foreach ($product->colors->all() as $color) {
			echo $color->name . ' - ';
		}
		echo "<br>";
	}
});

Route::get('/colors', function () {
   $colors = App\Color::all();

	foreach ($colors as $color) {
		echo "<h2>$color->name</h2>";
		foreach ($color->products->all() as $product) {
			echo $product->name . ' - ';
		}
		// $color->products->all()->pluck('name')->implode(' - ');
		echo "<br>";
	}
});
