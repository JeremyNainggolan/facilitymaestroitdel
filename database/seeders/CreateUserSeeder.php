<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = array(
            array(
                'name' => 'Rahel Simanjuntak',
                'email' => 'rahelsimanjuntak2909@gmail.com',
                'username' => 'rahelsimanjuntak2909',
                'phonenumber' => '082166796689',
                'type' => 0,
                'password' => Hash::make('simanjuntak123'),
            ),
            array(
                'name' => 'Krisnia Siahaan',
                'email' => 'krisniacalysta@gmail.com',
                'username' => 'krisniasiahaan',
                'phonenumber' => '081362078866',
                'type' => 0,
                'password' => Hash::make('krisnia123'),
            ),
            array(
                'name' => 'Gracia Purba',
                'email' => 'graciapurba278@gmail.com',
                'username' => 'graciapurba27',
                'phonenumber' => '082298630250',
                'type' => 0,
                'password' => Hash::make('graciapurba123'),
            ),
            array(
                'name' => 'Jeremy Nainggolan',
                'email' => 'jeremy.nainggolann@gmail.com',
                'username' => 'mart.jeremiah',
                'phonenumber' => '085171679411',
                'type' => 1,
                'password' => Hash::make('martjeremiah123'),
            ),
        );

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
