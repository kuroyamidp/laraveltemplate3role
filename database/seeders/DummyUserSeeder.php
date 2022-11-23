<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'dosen',
            'uid' => Str::uuid(),
            'email' => 'dosen@gmail.com',
            'role_id' => 1,
            'password' => Hash::make('rootADMINsuper321'),
        ]);
        DB::table('users')->insert([
            'name' => 'mahasiswa',
            'uid' => Str::uuid(),
            'email' => 'mahasiswa@gmail.com',
            'role_id' => 2,
            'password' => Hash::make('rootADMINsuper321'),
        ]);
    }
}
