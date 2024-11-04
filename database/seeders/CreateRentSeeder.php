<?php

namespace Database\Seeders;

use App\Models\Rent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateRentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Rent = array(
            array(
                'rend_id' => 'RD01',
                'item_id' => 'G01',
                'facility_id' => '11',
                'user_id' => '1',
                'rent_user' => 'Rahel Simanjuntak',
                'status' => 'Accept',
                'request_date' => '27 Oktober 2024',
                'approve_date' => '28 Oktober 2024',
                'reject_date' => '',
                'return_date' => '',
                'rent_date' => '30 Oktober 2024',
                'created_at' => 'now()',
                'update_at' => 'now()',
            ),
            array(
                'rend_id' => 'RD02',
                'item_id' => 'Bl12',
                'facility_id' => '5',
                'user_id' => '2',
                'rent_user' => 'Krisnia Siahaan',
                'status' => 'Accept',
                'request_date' => '13 Februari 2024',
                'approve_date' => '15 Februari 2024',
                'reject_date' => '',
                'return_date' => '',
                'rent_date' => '18 Februari 2024',
                'created_at' => 'now()',
                'update_at' => 'now()',
            ),
            array(
                'rend_id' => 'RD03',
                'item_id' => 'Sht21',
                'facility_id' => '5',
                'user_id' => '3',
                'rent_user' => 'Gracia Purba',
                'status' => 'Accept',
                'request_date' => '5 Mei 2024',
                'approve_date' => '7 Mei 2024',
                'reject_date' => '',
                'return_date' => '',
                'rent_date' => '10 Mei 2024',
                'created_at' => 'now()',
                'update_at' => 'now()',
            ),
            array(
                'rend_id' => 'RD04',
                'item_id' => 'Ba22',
                'facility_id' => '11',
                'user_id' => '1',
                'rent_user' => 'Rahel Simanjuntak',
                'status' => 'Pending',
                'request_date' => '27 September 2024',
                'approve_date' => '28 September 2024',
                'reject_date' => '',
                'return_date' => '',
                'rent_date' => '30 September 2024',
                'created_at' => 'now()',
                'update_at' => 'now()',
            ),
            array(
                'rend_id' => 'RD05',
                'item_id' => 'Spk01',
                'facility_id' => '10',
                'user_id' => '2',
                'rent_user' => 'Krisnia Siahaan',
                'status' => 'Pendiing',
                'request_date' => '1 Agustus 2024',
                'approve_date' => '',
                'reject_date' => '',
                'return_date' => '2 Agustus 2024',
                'rent_date' => '',
                'created_at' => 'now()',
                'update_at' => 'now()',
            ),
            array(
                'rend_id' => 'RD06',
                'item_id' => 'Ca23',
                'facility_id' => '11',
                'user_id' => '3',
                'rent_user' => 'Gracia Purba',
                'status' => 'Pending',
                'request_date' => '2 Juni 2024',
                'approve_date' => '3 Juni 2024',
                'reject_date' => '',
                'return_date' => '',
                'rent_date' => '7 Juni 2024',
                'created_at' => 'now()',
                'update_at' => 'now()',
            ),
            array(
                'rend_id' => 'RD07',
                'item_id' => 'Ca23',
                'facility_id' => '11',
                'user_id' => '1',
                'rent_user' => 'Rahel Simanjuntak',
                'status' => 'Reject',
                'request_date' => '15 Maret 2024',
                'approve_date' => '16 Maret 2024',
                'reject_date' => '',
                'return_date' => '',
                'rent_date' => '20 Maret 2024',
                'created_at' => 'now()',
                'update_at' => 'now()',
            ),
            array(
                'rend_id' => 'RD08',
                'item_id' => 'Tn32',
                'facility_id' => '10',
                'user_id' => '2',
                'rent_user' => 'Krisnia Siahaan',
                'status' => 'Reject',
                'request_date' => '4 Juli 2024',
                'approve_date' => '5 Juli 2024',
                'reject_date' => '',
                'return_date' => '',
                'rent_date' => '7 Juli 2024',
                'created_at' => 'now()',
                'update_at' => 'now()',
            ),
            array(
                'rend_id' => 'RD09',
                'item_id' => 'T11',
                'facility_id' => '11',
                'user_id' => '3',
                'rent_user' => 'Gracia Purba',
                'status' => 'Reject',
                'request_date' => '12 April 2024',
                'approve_date' => '',
                'reject_date' => '13 April 2024',
                'return_date' => '',
                'rent_date' => '',
                'created_at' => 'now()',
                'update_at' => 'now()',
            ),
        );

        foreach ($Rent as $rent) {
            Rent::create($rent);
        }
    }
}
