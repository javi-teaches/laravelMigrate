<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['name', 'price', 'category_id', 'brand_id', 'image'];

	public function category()
	{
		// Cuando la relación es hasOne SI es necesario declarar todos los atributos
		return $this->hasOne(Category::class, 'id', 'category_id');
	}

	public function brand()
	{
		// Cuando la relación es hasOne SI es necesario declarar todos los atributos
		return $this->hasOne(Brand::class, 'id', 'brand_id');
	}

	public function colors()
	{
		// return $this->belongsToMany(Color::class, 'color_product', 'product_id', 'color_id')->withTimestamps();

		// En las realción es de "muchos", si las foreign keys y los constraints están bien hechos
		// No es necesario pasar los demas parámetros
		return $this->belongsToMany(Color::class)->withTimestamps();
	}
}
