<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PromoCode;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ClientSeeder::class,
            OfferSeeder::class,
            UserSeeder::class,
            FuneralSeeder::class,
            FuneralUserSeeder::class,
            PromoCodeSeeder::class
        ]);
    }
}
