<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role
        DB::table('roles')->insert([
            'name' => 'SuperAdmin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);

         DB::table('roles')->insert([
            'name' => 'Admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);

         DB::table('roles')->insert([
            'name' => 'Pegawai',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);
    }
}
