<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'aaa@aaa.hu',
            'password' => bcrypt('aaaaaaaa'),
            'role' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'bbb@bbb',
            'password' => bcrypt('bbbbbbbb'),
            'role' => 1,
        ]);
    }
}
