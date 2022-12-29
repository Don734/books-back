<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::whereEmail('admin@domain.com')->doesntExist()) {
            User::create([
                'first_name' => 'John',
                'last_name' => 'Doe',
                'password' => Hash::make('password'),
                'email' =>  'admin@domain.com',
            ]);
        }
    }
}
