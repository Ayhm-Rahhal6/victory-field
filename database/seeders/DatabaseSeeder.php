<?php

namespace Database\Seeders;


use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Ayhm',
            'email' => 'ayhm@gmail.com',
            'phone_number' => '0790578848',
            'password' => Hash::make('ayhm2001'), 
            'role' => 'super_admin', 
        ]);
    }
}
