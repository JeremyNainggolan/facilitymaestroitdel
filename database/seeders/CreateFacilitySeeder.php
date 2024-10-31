<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

return new class extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            [
                'name' => 'Ruang Serbaguna',
                'detail' => 'Ruang yang dapat digunakan untuk berbagai keperluan seperti seminar, pertemuan, dan acara.',
                'filename' => 'room1.jpg',
                'status' => 'Reject',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kantin',
                'detail' => 'Tempat makan yang menyediakan berbagai menu sehat dan cepat saji.',
                'filename' => 'canteen.jpg',
                'status' => 'Pending',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laboratorium Komputer',
                'detail' => 'Laboratorium yang dilengkapi dengan komputer terbaru untuk keperluan pembelajaran.',
                'filename' => 'computer_lab.jpg',
                'status' => 'Reject',
                'condition' => 'bad',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lapangan Olahraga',
                'detail' => 'Lapangan yang digunakan untuk berbagai jenis olahraga seperti sepak bola, basket, dan voli.',
                'filename' => 'sports_field.jpg',
                'status' => 'Accept',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ruang Meeting',
                'detail' => 'Ruang yang dirancang khusus untuk pertemuan bisnis dan presentasi.',
                'filename' => 'meeting_room.jpg',
                'status' => 'Pending',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ruang Kelas',
                'detail' => 'Kelas yang dilengkapi dengan kursi dan meja untuk kegiatan belajar mengajar.',
                'filename' => 'classroom.jpg',
                'status' => 'Accept',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Perpustakaan',
                'detail' => 'Tempat yang menyediakan berbagai koleksi buku dan sumber belajar lainnya.',
                'filename' => 'library.jpg',
                'status' => 'Reject',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Open Teater',
                'detail' => 'Ruangan untuk kumpul dan kegiatan',
                'filename' => 'reading_room.jpg',
                'status' => 'Accept',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Auditorium',
                'detail' => 'Ruang yang digunakan untuk kuliah umum',
                'filename' => 'auditorium.jpg',
                'status' => 'Pending',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ruang Seni',
                'detail' => 'Tempat untuk berkreasi dalam seni lukis dan kerajinan tangan.',
                'filename' => 'art_room.jpg',
                'status' => 'Accept',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($facilities as $facility) {
            DB::table('facility')->insert($facility);
        }
    }
};
