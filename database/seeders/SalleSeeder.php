<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table( 'salles' )->insert(
            [
                [
                    'id' => 1,
                    'nom_salle' => 'Salle01',
                    'num_salle' => 'S101'
                ], [
                    'id' => 2,
                    'nom_salle' => 'Salle02',
                    'num_salle' => 'S102'
                ], [
                    'id' => 3,
                    'nom_salle' => 'Salle03',
                    'num_salle' => 'S103'
                ]
            ]
        );
    }
}
