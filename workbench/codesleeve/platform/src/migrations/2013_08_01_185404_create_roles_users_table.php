<?php

use Illuminate\Database\Migrations\Migration;

class CreateRolesUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('platform_roles_users', function($table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('role_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('platform_roles_users');
	}

}