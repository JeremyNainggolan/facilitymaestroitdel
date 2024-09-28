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

        User::factory()->create([
            'name' => 'Jeremy Nainggolan',
            'email' => 'jeremy.nainggolann@gmail.com',
            'username' => 'mart.jeremiah',
            'phonenumber' => '085171679411',
            'type' => 1,
            'password' => Hash::make('martjeremiah123'),
        ]);
    }
}
