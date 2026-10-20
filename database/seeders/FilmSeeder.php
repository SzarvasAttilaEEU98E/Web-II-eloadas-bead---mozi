<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    public function run(): void
    {
        $file = fopen(database_path('data/film.txt'), 'r');

        fGetCsv($file, 0, "\t");

        while (($data = fGetCsv($file, 0 , "\t")) !== false)
            {
                DB::table('films')->insert([
                    'id' => $data[0],
                    'cim' => $data[1],
                    'ev' => $data[2],
                    'hossz' => $data[3],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            fclose($file);
    }
}