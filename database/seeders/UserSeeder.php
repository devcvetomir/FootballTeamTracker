<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed a user with is_admin set to true
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123'), // You can replace 'password' with the desired password
            'is_admin' => true,
        ]);

        // You can add more user seeds here if needed
    }
}
