<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                [
                    'name' => 'admin', 'surname' => '','email' => 'admin@admin.pl','password' => Hash::make('1234'),
                    'phone_number' => '000000000','salary' => '0'
                ],
                [
                    'name' => 'Jan','surname' => 'Grzebyk','email' => 'j.grzebyk@gmail.com','password' => Hash::make('1234'),
                    'phone_number' => '935915734','salary' => '3100'
                ],
                [
                    'name' => 'Zdzisław','surname' => 'Pokątny','email' => 'zd.pokatny@gmail.com','password' => Hash::make('1234'),
                    'phone_number' => '192754824','salary' => '4000'
                ],

            ]
        );
    }
}
