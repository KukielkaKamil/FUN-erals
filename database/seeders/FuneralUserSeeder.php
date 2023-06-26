<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuneralUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('funeral_user') -> insert([
            ['user_id' => 4, 'funeral_id' =>1],
            ['user_id' => 2, 'funeral_id' =>1],
            ['user_id' => 3, 'funeral_id' =>2],
            ['user_id' => 2, 'funeral_id' =>3],
            ['user_id' => 3, 'funeral_id' =>4],
            ['user_id' => 4, 'funeral_id' =>4],
            ['user_id' => 3, 'funeral_id' =>5],
            ['user_id' => 3, 'funeral_id' =>6],
            ['user_id' => 4, 'funeral_id' =>6],
            ['user_id' => 2, 'funeral_id' =>7],
            ['user_id' => 3, 'funeral_id' =>7],
            ['user_id' => 4, 'funeral_id' =>7],
            ['user_id' => 3, 'funeral_id' =>8],

        ]);
    }
}
