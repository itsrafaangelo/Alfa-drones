<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Drones Profissionais',
                'slug' => 'drones-profissionais',
                'description' => 'Drones de alta performance para uso profissional em mapeamento e inspeções',
                'active' => true,
            ],
            [
                'name' => 'Agricultura de Precisão',
                'slug' => 'agricultura-precisao',
                'description' => 'Equipamentos especializados para agricultura de precisão e monitoramento de culturas',
                'active' => true,
            ],
            [
                'name' => 'Sensores e Câmeras',
                'slug' => 'sensores-cameras',
                'description' => 'Sensores multiespectrais e câmeras de alta resolução para drones',
                'active' => true,
            ],
            [
                'name' => 'GPS e Navegação',
                'slug' => 'gps-navegacao',
                'description' => 'Sistemas de GPS RTK e equipamentos de navegação precisos',
                'active' => true,
            ],
            [
                'name' => 'Acessórios',
                'slug' => 'acessorios',
                'description' => 'Baterias, carregadores, cases e outros acessórios para drones',
                'active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
