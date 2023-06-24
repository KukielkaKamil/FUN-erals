<?php

namespace Database\Seeders;

use App\Models\PromoCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromoCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PromoCode::insert(
            [
                [
                    'code' => 'FUN-erals', 'discount' => '0.10', 'exp_date' => '2023-07-30', 'client_id' => null
                ],
                [
                    'code' => 'xY4sN6J3rT7qL9pB0mZ1K8V2C5D3f6', 'discount' => '0.15', 'exp_date' => '2023-11-05', 'client_id' => null
                ],
                [
                    'code' => 'High Five', 'discount' => '0.05', 'exp_date' => '2024-01-01', 'client_id' => null
                ],
            ]
        );
    }
}
