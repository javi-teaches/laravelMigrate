<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
	protected $fillable = ['name'];

	public function products()
	{
		return $this->belongsToMany(Product::class, 'color_product', 'color_id', 'product_id')->withTimestamps();
	}
}
