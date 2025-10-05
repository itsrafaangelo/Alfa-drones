<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $droneCategory = Category::where('slug', 'drones-profissionais')->first();
        $agriculturaCategory = Category::where('slug', 'agricultura-precisao')->first();
        $sensoresCategory = Category::where('slug', 'sensores-cameras')->first();
        $gpsCategory = Category::where('slug', 'gps-navegacao')->first();

        $products = [
            [
                'category_id' => $droneCategory->id,
                'name' => 'DJI Air 3S Professional',
                'slug' => 'dji-air-3s-professional',
                'description' => 'Drone profissional com câmera 4K, gimbal de 3 eixos e tempo de voo de até 46 minutos. Ideal para mapeamento aéreo e inspeções técnicas.',
                'short_description' => 'Drone profissional com câmera 4K e 46min de voo',
                'price' => 8500.00,
                'sale_price' => 7650.00,
                'stock_quantity' => 15,
                'images' => ['air3s.jpg', 'drone-1.jpg', 'drone-2.jpg'],
                'specifications' => [
                    'Tempo de Voo' => '46 minutos',
                    'Câmera' => '4K/60fps',
                    'Alcance' => '15 km',
                    'Peso' => '720g',
                    'Velocidade Máxima' => '21 m/s',
                ],
                'active' => true,
                'featured' => true,
            ],
            [
                'category_id' => $droneCategory->id,
                'name' => 'DJI Mini 4 Pro',
                'slug' => 'dji-mini-4-pro',
                'description' => 'Drone compacto e leve com recursos profissionais. Perfeito para iniciantes e profissionais que precisam de portabilidade.',
                'short_description' => 'Drone compacto com recursos profissionais',
                'price' => 4200.00,
                'stock_quantity' => 25,
                'images' => ['Mini 4.jpg', 'drone-3.jpg'],
                'specifications' => [
                    'Tempo de Voo' => '34 minutos',
                    'Câmera' => '4K/60fps',
                    'Peso' => '249g',
                    'Alcance' => '10 km',
                ],
                'active' => true,
                'featured' => true,
            ],
            [
                'category_id' => $agriculturaCategory->id,
                'name' => 'Sensor Multiespectral AgriCam Pro',
                'slug' => 'sensor-multiespectral-agricam-pro',
                'description' => 'Sensor multiespectral de 5 bandas para análise de culturas, detecção de pragas e monitoramento de saúde das plantas.',
                'short_description' => 'Sensor multiespectral para agricultura de precisão',
                'price' => 15000.00,
                'sale_price' => 13500.00,
                'stock_quantity' => 8,
                'images' => ['sensor-1.jpg', 'sensor-2.jpg'],
                'specifications' => [
                    'Bandas Espectrais' => '5 bandas',
                    'Resolução' => '1.2 MP por banda',
                    'Peso' => '180g',
                    'Formato de Saída' => 'TIFF, JPEG',
                ],
                'active' => true,
                'featured' => true,
            ],
            [
                'category_id' => $gpsCategory->id,
                'name' => 'GPS RTK Base Station Pro',
                'slug' => 'gps-rtk-base-station-pro',
                'description' => 'Estação base RTK para posicionamento centimétrico em levantamentos topográficos e mapeamentos de precisão.',
                'short_description' => 'Estação base RTK para posicionamento preciso',
                'price' => 25000.00,
                'stock_quantity' => 5,
                'images' => ['gps-1.jpg', 'gps-2.jpg'],
                'specifications' => [
                    'Precisão' => '1cm + 1ppm',
                    'Canais' => '184 canais',
                    'Alcance' => '10 km',
                    'Bateria' => '8 horas',
                ],
                'active' => true,
                'featured' => false,
            ],
            [
                'category_id' => $sensoresCategory->id,
                'name' => 'Câmera Termal FlirVue Pro',
                'slug' => 'camera-termal-flirvue-pro',
                'description' => 'Câmera térmica profissional para inspeções de infraestrutura, detecção de vazamentos e monitoramento industrial.',
                'short_description' => 'Câmera térmica para inspeções profissionais',
                'price' => 12000.00,
                'stock_quantity' => 12,
                'images' => ['sensor-3.jpg', 'sensor-4.jpg'],
                'specifications' => [
                    'Resolução Térmica' => '640x512',
                    'Sensibilidade' => '<50mK',
                    'Peso' => '113g',
                    'Formato de Vídeo' => 'MP4, AVI',
                ],
                'active' => true,
                'featured' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
