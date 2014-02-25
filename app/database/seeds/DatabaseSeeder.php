<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		//$this->call('Codesleeve\Platform\RolesTableSeeder');
		//$this->call('Codesleeve\Platform\UsersTableSeeder');
	}

}