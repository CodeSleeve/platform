<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('users')->delete();

        // Uncomment the below to run the seeder
        DB::table('users')->insert(
            [
                'email' => 'admin@codesleeve.com',
                'password' => Hash::make('password'),
                'first_name' => '',
                'last_name' => '',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        );

        User::find(1)->roles()->attach(1); 
    }

}