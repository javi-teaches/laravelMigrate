<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable = ['name'];

	public function products()
	{
		// return $this->hasMany(Product::class, 'category_id', 'id');

		// En las realción es de "muchos", si las foreign keys y los constraints están bien hechos
		// No es necesario pasar los demas parámetros
		return $this->hasMany(Product::class);
	}
}
