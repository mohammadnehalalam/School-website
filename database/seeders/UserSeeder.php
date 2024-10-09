<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('1'),
        ]);
    }
}
