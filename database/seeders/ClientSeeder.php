<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Funeral;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Funeral::truncate();
            Client::truncate();
        });

        Client::insert(
            [
                [
                    'name' => 'Jan', 'surname' => 'Kowalski', 'pesel' => '12398546324',
                    'phone_number' => '865435092', 'email' => 'j.kowalski@gmail.com'
                ],
                [
                    'name' => 'Edmund', 'surname' => 'Podloski', 'pesel' => '75643209763',
                    'phone_number' => '785463109', 'email' => 'edm.podolski@gmail.com'
                ],
                [
                    'name' => 'Józef', 'surname' => 'Potocki', 'pesel' => '89754278634',
                    'phone_number' => '163706273', 'email' => 'j.potocki@gmail.com'
                ],
                [
                    'name' => 'Adam', 'surname' => 'Drzewicki', 'pesel' => '10983746519',
                    'phone_number' => '209648726', 'email' => 'a.drzewicki782@gmail.com'
                ],
                [
                    'name' => 'Edmund', 'surname' => 'Hass', 'pesel' => '01302387531',
                    'phone_number' => '696081637', 'email' => 'e.hass@onet.pl'
                ],

            ]
        );
    }
}
