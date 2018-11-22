<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
   protected $fillable = ['name'];

	public function products()
	{
		// return $this->hasMany(Product::class, 'brand_id', 'id');

		// En las realción es de "muchos", si las foreign keys y los constraints están bien hechos
		// No es necesario pasar los demas parámetros
		return $this->hasMany(Product::class);
	}
}
