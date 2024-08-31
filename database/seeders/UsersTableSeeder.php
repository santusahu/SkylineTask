<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'role' => 'Admin',
                'email_verified_at' => now(),
                'password' => Hash::make('adminpassword'),
            ],
            [
                'name' => 'User 1',
                'email' => 'user1@gmail.com',
                'role' => 'User',
                'email_verified_at' => now(),
                'password' => Hash::make('password1'),
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@gmail.com',
                'role' => 'User',
                'email_verified_at' => now(),
                'password' => Hash::make('password2'),
            ],
            [
                'name' => 'User 3',
                'email' => 'user3@gmail.com',
                'role' => 'User',
                'email_verified_at' => now(),
                'password' => Hash::make('password3'),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
