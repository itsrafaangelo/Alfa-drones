<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alert;

class AlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alerts = [
            [
                'type' => 'success',
                'title' => 'Sistema OK',
                'message' => 'Todos os serviços funcionando normalmente',
                'icon' => 'check',
                'is_active' => true,
                'priority' => 1,
            ],
            [
                'type' => 'warning',
                'title' => 'Estoque Baixo',
                'message' => 'Produtos com estoque abaixo do nível mínimo detectados',
                'icon' => 'exclamation',
                'is_active' => true,
                'priority' => 3,
            ],
        ];

        foreach ($alerts as $alert) {
            Alert::create($alert);
        }
    }
}
