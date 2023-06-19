<?php

namespace Database\Seeders;

use App\Models\Funeral;
use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Funeral::truncate();
            Status::truncate();
        });

        Status::insert(
            [
                [
                    'name' => 'new'
                ],
                [
                    'name' => 'ready to go'
                ],
                [
                    'name' => 'in progress'
                ],
                [
                    'name' => 'done'
                ],
            ]
        );
    }
}
