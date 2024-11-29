<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\SalleSeeder;
use Database\Seeders\ModuleSeeder;
use Database\Seeders\EtagereSeeder;
use Database\Seeders\PlacardSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\EnseignerSeeder;
use Database\Seeders\ProfessorSeeder;
use Database\Seeders\TechnicianSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(ProfessorSeeder::class);
        $this->call(TechnicianSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(SalleSeeder::class);
        $this->call(EnseignerSeeder::class);
        $this->call(PlacardSeeder::class);
        $this->call(EtagereSeeder::class);
    }
}
