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
		echo "<h2>Product: $product->name</h2>";
		echo "<image src='/images/{$product->image}' width='100'>";
		echo "<ul>";
			echo "<li><b>Category:</b> {$product->category->name}</li>";
			echo "<li><b>Brand:</b> {$product->brand->name}</li>";
			echo "<li><b>Colors:</b>";
				echo "<ul>";
				foreach ($product->colors->all() as $color) {
					echo "<li>$color->name</li>";
				}
				echo "</ul>";
			echo "</li>";
		echo "</ul>";
	}
});

Route::get('/colors', function () {
   $colors = App\Color::all();

	foreach ($colors as $color) {
		echo "<h2>Color: $color->name</h2>";
		echo "<ul>";
			echo "<li><b>Products:</b>";
				echo "<ul>";
				foreach ($color->products->all() as $product) {
					echo "<li>$product->name</li>";
				}
				// $color->products->all()->pluck('name')->implode(' - ');
				echo "</ul>";
			echo "</li>";
		echo "</ul>";
	}
});

Route::get('/categories', function () {
   $categories = App\Category::all();

	foreach ($categories as $category) {
		echo "<h2>Category: $category->name</h2>";
		echo "<ul>";
		echo "<li><b>Products:</b>";
		echo "<ul>";
		foreach ($category->products->all() as $product) {
			echo "<li>$product->name</li>";
		}
		echo "</ul>";
		echo "</li>";
		echo "</ul>";
	}
});

// Route::get('/products', 'ProductController@index'); // index
// Route::post('/products', 'ProductController@store'); // store
// Route::get('/products/create', 'ProductController@create'); // create
// Route::get('/products/{id}', 'ProductController@show'); // show
// Route::update('/products/{id}', 'ProductController@update'); // update
// Route::delete('/products/{id}', 'ProductController@destroy'); // destroy
// Route::get('/products/{id}/edit', 'ProductController@edit'); // edit

Route::resource('/products', 'ProductController');
Route::get('/products/api/getProducts', 'ProductController@apiGetProducts');
