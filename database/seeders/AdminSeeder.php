<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'username' => 'Admin',
            'role' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')

        ]);

        $user = User::create([
            'username' => 'User',
            'role' => 'User',
            'firstname' => 'Mishoba',
            'lastname' => 'Selvarathnam',
            'address' => 'Kopay, North Kopay, Jaffna.',
            'mobile' => '077 240 9260',
            'email' => 'misho@gmail.com',
            'password' => bcrypt('password')

        ]);
    }
}
