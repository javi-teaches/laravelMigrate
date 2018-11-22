<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['name', 'price', 'category_id', 'brand_id'];

	public function category()
	{
		return $this->hasOne(Category::class, 'id', 'category_id');
	}

	public function brand()
	{
		return $this->hasOne(Brand::class, 'id', 'brand_id');
	}

	public function colors()
	{
		return $this->belongsToMany(Color::class, 'color_product', 'product_id', 'color_id')->withTimestamps();
	}
}
