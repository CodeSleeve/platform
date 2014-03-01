<?php namespace Codesleeve\Platform\Seeds;

use DB, Hash, Seeder;
use Codesleeve\Platform\Models\Role;
use Codesleeve\Platform\Models\User;

class PlatformTableSeeder extends Seeder
{
    /**
     * Run the platform seeder
     *
     */
    public function run()
    {
        $this->createRole('Admin');
        $this->createRole('User');

        $this->createUser('admin', 'password', 'Admin', 'User', 'Admin');
    }

    /**
     * Create a new user with the given attributes
     *
     */
    protected function createUser($email, $password, $firstName, $lastName, $role = null)
    {
        $user = DB::table('users')->where('email', $email)->first();

        if ($user)
        {
            return;
        }

        $userId = DB::table('users')->insertGetId([
            'email' => $email,
            'password' => Hash::make($password),
            'first_name' => $firstName,
            'last_name' => $lastName,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        if (!$role)
        {
            return;
        }

        $role = Role::where('name', $role)->first();
        DB::table('roles_users')->insert([
            'role_id' => $role->id,
            'user_id' => $userId
        ]);
    }

    /**
     * Create roles if they don't exist already
     *
     */
    protected function createRole($name)
    {
        $role = DB::table('roles')->where('name', $name)->first();

        if ($role) {
            return;
        }

        DB::table('roles')->insert([
            'name' => $name,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }

}