<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoziSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = fopen(database_path('data/mozi.txt'), 'r');

        fGetCsv($file, 0, "\t");

        while (($data = fGetCsv($file, 0 , "\t")) !== false)
            {
                DB::table('mozis')->insert([
                    'id' => $data[0],
                    'nev' => $data[1],
                    'varos' => $data[2],
                    'ferohely' => $data[3],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            fclose($file);
    }
}