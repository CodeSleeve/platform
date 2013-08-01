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
                'created_at' => date(DATE_ATOM),
                'updated_at' => date(DATE_ATOM)
            ]
        );

        User::find(1)->roles()->attach(1); 
    }

}