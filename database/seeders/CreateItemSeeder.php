<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('item')->insert([
            [
                'item_name' => 'Chair',
                'location' => 'Main Storage',
                'description' => 'A comfortable office chair',
                'item_status' => 'available',
                'condition' => 'good',
                'filename' => 'chair.jpg',
                'storage_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_name' => 'Table',
                'location' => 'Main Storage',
                'description' => 'A wooden table',
                'item_status' => 'unavailable',
                'condition' => 'broken',
                'filename' => 'table.jpg',
                'storage_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_name' => 'Projector',
                'storage_id' => 2,
                'location' => 'Backup Storage',
                'description' => 'Multimedia projector for presentations',
                'item_status' => 'available',
                'condition' => 'good',
                'filename' => 'projector.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
