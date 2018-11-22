<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
	protected $fillable = ['name'];

	public function products()
	{
		// return $this->belongsToMany(Product::class, 'color_product', 'color_id', 'product_id')->withTimestamps();

		// En las relación es de "muchos", si las foreign keys y los constraints están bien hechos
		// No es necesario pasar los demas parámetros
		return $this->belongsToMany(Product::class)->withTimestamps();
	}
}
