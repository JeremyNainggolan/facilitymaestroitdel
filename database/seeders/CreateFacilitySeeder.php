<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            [
                'facility_id' => 1,
                'name' => 'Ruang Serbaguna',
                'detail' => 'Ruang yang dapat digunakan untuk berbagai keperluan seperti seminar, pertemuan, dan acara.',
                'filename' => 'room1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_id' => 3,
                'name' => 'Kantin',
                'detail' => 'Tempat makan yang menyediakan berbagai menu sehat dan cepat saji.',
                'filename' => 'canteen.jpg',
                'status' => 'Pending',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_id' => 4,
                'name' => 'Laboratorium Komputer',
                'detail' => 'Laboratorium yang dilengkapi dengan komputer terbaru untuk keperluan pembelajaran.',
                'filename' => 'computer_lab.jpg',
                'status' => 'Reject',
                'condition' => 'bad',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_id' => 5,
                'name' => 'Lapangan Olahraga',
                'detail' => 'Lapangan yang digunakan untuk berbagai jenis olahraga seperti sepak bola, basket, dan voli.',
                'filename' => 'sports_field.jpg',
                'status' => 'Accept',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_id' => 6,
                'name' => 'Ruang Meeting',
                'detail' => 'Ruang yang dirancang khusus untuk pertemuan bisnis dan presentasi.',
                'filename' => 'meeting_room.jpg',
                'status' => 'Pending',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_id' => 7,
                'name' => 'Ruang Kelas',
                'detail' => 'Kelas yang dilengkapi dengan kursi dan meja untuk kegiatan belajar mengajar.',
                'filename' => 'classroom.jpg',
                'status' => 'Accept',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_id' => 8,
                'name' => 'Perpustakaan',
                'detail' => 'Tempat yang menyediakan berbagai koleksi buku dan sumber belajar lainnya.',
                'filename' => 'library.jpg',
                'status' => 'Reject',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_id' => 9,
                'name' => 'Open Teater',
                'detail' => 'Ruangan untuk kumpul dan kegiatan.',
                'filename' => 'open_theater.jpg',
                'status' => 'Accept',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_id' => 10,
                'name' => 'Auditorium',
                'detail' => 'Ruang yang digunakan untuk kuliah umum.',
                'filename' => 'auditorium.jpg',
                'status' => 'Pending',
                'condition' => 'good',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'facility_id' => 11,
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
            Facility::create($facility);
        }
    }
};
