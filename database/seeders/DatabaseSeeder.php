<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criar usuário admin
        User::factory()->create([
            'name' => 'Admin Alfa Drones',
            'email' => 'admin@alfadrones.com.br',
            'password' => bcrypt('admin123'),
        ]);

        // Executar seeders
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
