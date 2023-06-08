<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'lastname' => "ONG",
            'firstname' => "acid",
            'contact' => "8653292933",
            'email' => "acid@gmail.com",
            'role' => 1,
            'photo' => '/images/user.svg',
            'password' => Hash::make("123456789"),
        ]);
    }
}
