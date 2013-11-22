<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	DB::table('users')->delete();

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

        DB::table('users')->insert(
            [
                'email' => 'admin',
                'password' => Hash::make('password'),
                'first_name' => 'Admin',
                'last_name' => 'User',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        );

        $role = Role::where('name', 'admin')->first();
        User::where('email', 'admin')->first()->roles()->attach($role->id); 
        User::where('email', 'admin@codesleeve.com')->first()->roles()->attach($role->id);
    }

}