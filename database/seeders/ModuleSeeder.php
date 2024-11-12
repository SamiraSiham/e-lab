<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModuleSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run(): void {
        DB::table( 'modules' )->insert(
            [
                [
                    'id' => 1,
                    'nom_module' => 'Optic',
                    'num_module' => 'M101'
                ], [
                    'id' => 2,
                    'nom_module' => 'mecanique',
                    'num_module' => 'M102'
                ], [
                    'id' => 3,
                    'nom_module' => 'Electrecite',
                    'num_module' => 'M103'
                ]
            ]
        );
    }
}
