<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Support\Str;

class AdminSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run(): void {
        User::create( [
            'nom' => 'Siham',
            'prenom' => 'Samira',
            'email' => 'samirasiham.admin@gmail.com',
            'email_verified_at' => now(),
            'password' => 'samsihamadmin1234',
            'remember_token' => Str::random( 10 ),
        ] )->assignRole('admin');
    }
}
