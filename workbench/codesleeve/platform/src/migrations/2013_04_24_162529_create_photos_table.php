<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhotosTable extends migration{

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('platform_photos', function(Blueprint $table){
			$table->increments('id');
			$table->string('photo_file_name');
		    $table->integer('photo_file_size');
		    $table->string('photo_content_type');
		    $table->date('photo_updated_at');
		    $table->timestamps();
		});
		
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('platform_photos');
	}

}