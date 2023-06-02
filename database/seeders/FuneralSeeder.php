<?php

namespace Database\Seeders;

use App\Models\Funeral;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Funeral::insert(
            [
                [
                    'date' => '2023-07-23 09:45:00', 'cost' => '1700', 'status' => 'done',
                    'offer_id' => '1', 'client_id' => '1'
                ],
                [
                    'date' => '2023-07-25 11:00:00', 'cost' => '1800', 'status' => 'done',
                    'offer_id' => '2', 'client_id' => '2'
                ],
                [
                    'date' => '2023-07-26 09:30:00', 'cost' => '1600', 'status' => 'done',
                    'offer_id' => '1', 'client_id' => '3'
                ],
                [
                    'date' => '2023-07-26 10:00:00', 'cost' => '2000', 'status' => 'done',
                    'offer_id' => '1', 'client_id' => '4'
                ],
                [
                    'date' => '2023-07-27 09:00:00', 'cost' => '1900', 'status' => 'done',
                    'offer_id' => '3', 'client_id' => '3'
                ],
                [
                    'date' => '2023-07-28 11:30:00', 'cost' => '1600', 'status' => 'in progress',
                    'offer_id' => '1', 'client_id' => '3'
                ],
                [
                    'date' => '2023-07-29 13:45:00', 'cost' => '1700', 'status' => 'ready to go',
                    'offer_id' => '3', 'client_id' => '5'
                ],
                [
                    'date' => '2023-08-09 12:00:00', 'cost' => '1800', 'status' => 'ready to go',
                    'offer_id' => '3', 'client_id' => '1'
                ],
            ]
        );
    }
}
