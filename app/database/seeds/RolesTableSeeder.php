<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('roles')->delete();

        // Uncomment the below to run the seeder
        DB::table('roles')->insert(['name' => 'admin']);
        DB::table('roles')->insert(['name' => 'user']);
    }

}