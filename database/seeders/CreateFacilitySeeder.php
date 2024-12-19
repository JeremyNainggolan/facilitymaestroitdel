<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('facility')->insert([
            [
                'name' => 'Auditorium',
                'detail' => 'Large hall with advanced audio-visual equipment for events and conferences',
                'filename' => 'auditorium.jpg',
                'status' => 'available',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lapangan Hijau',
                'detail' => 'Open green field suitable for sports and outdoor activities',
                'filename' => 'lapangan_hijau.jpg',
                'status' => 'available',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ruang Kelas 516',
                'detail' => 'Classroom equipped with projectors and comfortable seating arrangements',
                'filename' => 'ruang_kelas_516.jpg',
                'status' => 'unavailable',
                'condition' => 'bad',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

}
