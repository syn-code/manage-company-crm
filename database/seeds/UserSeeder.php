<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{

    private $adminUsers = [
        [
            'name' => 'admin user',
            'email' => 'admin@admin.com',
            'password' => 'admin'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->adminUsers as $admin) {
            DB::table('users')->insert([
                'name' => $admin['name'],
                'email' => $admin['email'],
                'password' => bcrypt($admin['password']),
                'is_admin' => 1,
            ]);
        }
    }
}
