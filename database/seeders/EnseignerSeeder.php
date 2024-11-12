<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EnseignerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('enseigner')->insert([
            [
                'id' => 1,
                'salle_id' => 1,
                'module_id' => 1,
                'user_id' => 1,
                'type_cours' => 'TP',
                'date_deroulement' => Carbon::now()->format('Y-m-d'),
                'heure_debut' => Carbon::now()->format('H:i:s'),
                'heure_fin' => Carbon::now()->format('H:i:s'),
                'Support' => 'TP/test.pdf',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
