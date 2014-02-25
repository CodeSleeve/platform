<?php namespace Codesleeve\Platform;

use DB, Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('roles')->delete();

        // Uncomment the below to run the seeder
        DB::table('roles')->insert([
        	'name' => 'admin', 
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('roles')->insert([
        	'name' => 'user',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}