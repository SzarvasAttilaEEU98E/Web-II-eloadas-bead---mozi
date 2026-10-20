<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EloadasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = fopen(database_path('data/eloadas.txt'), 'r');

        fgetCsv($file, 0, "\t");

        
        while (($data = fgetcsv($file, 0, "\t")) !== false) 
            {
            DB::table('eloadas')->insert([
                'film_id' => $data[0],
                'mozi_id' => $data[1],
                'datum' => str_replace('.', '-', $data[2]),
                'nezoszam' => $data[3],
                'bevetel' => $data[4],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        fclose($file);
    }
}