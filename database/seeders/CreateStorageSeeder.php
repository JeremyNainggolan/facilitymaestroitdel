<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateStorageSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('storage')->insert([
            [
                'name' => 'Main Storage',
                'detail' => 'Primary storage area for all items',
                'usage' => 2,
                'capacity' => 100,
                'filename' => 'main_storage.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Backup Storage',
                'detail' => 'Secondary storage for backup items',
                'usage' => 1,
                'capacity' => 50,
                'filename' => 'backup_storage.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
