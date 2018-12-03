<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		factory(App\Color::class)->times(15)->create();
	}
}
