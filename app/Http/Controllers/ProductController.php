<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$products = Product::orderBy('id', 'desc')->get();
		return view('products.index', compact('products'));
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		$colors = \App\Color::all();
		$categories = \App\Category::all();
		$brands = \App\Brand::all();
		return view('products.create')->with(compact('colors', 'categories', 'brands'));
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request)
	{
		$request->validate([
			'colors' => 'required'
		]);

		$product = Product::create([
			'name' => $request->input('name'),
			'price' => $request->input('price'),
			'category_id' => $request->input('category_id'),
			'brand_id' => $request->input('brand_id'),
		]);

		$product->colors()->sync($request->input('colors'));

		return redirect()->route('products.create');
	}

	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function show($id)
	{
	//
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function edit($id)
	{
	//
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, $id)
	{
	//
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id)
	{
	//
	}

	public function apiGetProducts()
	{
		$products = Product::all();

		$finalPdtos = [];
		$counter = 0;
		foreach ($products as $product) {
			$finalPdtos[$counter] = [
				'id' => $product->id,
				'name' => $product->name,
				'price' => $product->price,
				'category' => $product->category->name,
				'brand' => $product->brand->name,
			];
			foreach ($product->colors ->all() as $color) {
				$finalPdtos[$counter]['colors'][] = $color->name;
			};
			$counter++;
		}
		return $finalPdtos;
	}
}
