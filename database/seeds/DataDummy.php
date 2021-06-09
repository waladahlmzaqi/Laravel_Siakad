<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DataDummy extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'admin',
            ],
            [
                'name' => 'guru',
                'email' => 'guru@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'guru',
            ],
            [
                'name' => 'siswa',
                'email' => 'siswa@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'siswa',
            ],
        ]);
    }
}
