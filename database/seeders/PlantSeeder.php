<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Plant
        DB::table('plants')->insert([
            'name' => 'MPM-Jakarta',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);

         DB::table('plants')->insert([
            'name' => 'MPM-Tarakan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);
    }
}
