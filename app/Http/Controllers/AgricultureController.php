<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgricultureController extends Controller
{
    public function index()
    {
        $services = [
            [
                'title' => 'Mapeamento com GNSS',
                'description' => 'Precisão no mapeamento das áreas de cultivo, com uso de tecnologia GNSS avançada.',
                'image' => 'agriculture/gps-mapping.jpg',
                'icon' => 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7',
                'modal_id' => 'gnss-modal'
            ],
            [
                'title' => 'Monitoramento com sensores',
                'description' => 'Utilizamos sensores para monitorar variáveis como umidade, temperatura e pH do solo.',
                'image' => 'agriculture/sensors.jpg',
                'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                'modal_id' => 'sensors-modal'
            ],
            [
                'title' => 'Análise aérea com drones',
                'description' => 'Captura de imagens aéreas para avaliar o estado das lavouras e identificar pontos de melhoria.',
                'image' => 'agriculture/drone-analysis.jpg',
                'icon' => 'M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z M15 13a3 3 0 11-6 0 3 3 0 016 0z',
                'modal_id' => 'drones-modal'
            ],
            [
                'title' => 'Planejamento amostral',
                'description' => 'Desenvolvimento de estratégias para coleta de amostras representativas das áreas de cultivo, garantindo a precisão na análise e tomada de decisões.',
                'image' => 'agriculture/sampling.jpg',
                'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01',
                'modal_id' => 'sampling-modal'
            ],
            [
                'title' => 'Mapeamento da variabilidade espacial e temporal',
                'description' => 'Análise detalhada da variabilidade das lavouras ao longo do tempo e em diferentes regiões.',
                'image' => 'agriculture/variability.jpg',
                'icon' => 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7',
                'modal_id' => 'variability-modal'
            ],
            [
                'title' => 'Aplicação em taxa variada',
                'description' => 'Utilização de drones para aplicar insumos de maneira personalizada, conforme as necessidades específicas de cada área do cultivo.',
                'image' => 'agriculture/variable-rate.jpg',
                'icon' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01',
                'modal_id' => 'variable-rate-modal'
            ],
        ];

        return view('agriculture.index', compact('services'));
    }
}
