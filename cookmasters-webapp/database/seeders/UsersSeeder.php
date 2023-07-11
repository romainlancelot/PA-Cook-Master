<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'email' => 'rlancelot@myges.fr',
                'username' => 'admin',
                'password' => bcrypt('jke7d4gDhU2862b'),
                'role_id' => 1,
                'email_verified_at' => now(),
            ],
            [
                'firstname' => 'java',
                'lastname' => 'app',
                'email' => 'javaapp@cookmasters.fr',
                'username' => 'javaapp',
                'password' => bcrypt('8l^lE8crdIn87c623ls6Pba2b*L9wx'),
                'role_id' => 1,
                'email_verified_at' => now(),
            ],
            [
                'firstname' => 'android',
                'lastname' => 'app',
                'email' => 'androidapp@cookmasters.fr',
                'username' => 'androidapp',
                'password' => bcrypt('vz@4AN$Ti8OGpNo&AT7v0VzsO@kj1w'),
                'role_id' => 1,
                'email_verified_at' => now(),
            ]
        ];

        User::insert($users);
        User::factory()->count(30)->create();
    }
}
