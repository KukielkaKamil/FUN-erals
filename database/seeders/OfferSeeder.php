<?php

namespace Database\Seeders;

use App\Models\Funeral;
use App\Models\Offer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Funeral::truncate();
            Offer::truncate();
        });

        Offer::insert(
            [
                [
                    'name' => 'Normal funeral', 'description' => 'Classic at if finest', 'duration' => '01:30:00',
                    'price' => '1500'
                ],
                [
                    'name' => 'Delux funeral', 'description' => 'Highest quallity service', 'duration' => '01:30:00',
                    'price' => '1800'
                ],
                [
                    'name' => 'Cremation', 'description' => 'An alternative to classic funeral', 'duration' => '01:30:00',
                    'price' => '1800'
                ],
            ]
        );
    }
}
