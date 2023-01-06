<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User SuperAdmin
          DB::table('users')->insert([
            'name' => 'SuperAdmin',
            'username' => 'SuperAdmin',
            'password' => Hash::make('SuperAdmin'),
            'role_id' => 1,
            'plants_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);

          DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'Admin',
            'password' => Hash::make('Admin'),
            'role_id' => 2,
            'plants_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ]);

          DB::table('users')->insert([
            'name' => 'Pegawai',
            'username' => 'Pegawai',
            'password' => Hash::make('Pegawai'),
            'role_id' => 3,
            'plants_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ]);
    }
}
