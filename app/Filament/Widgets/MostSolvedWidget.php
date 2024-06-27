<?php

namespace App\Filament\Widgets;

use App\Models\Word;
use Filament\Widgets\ChartWidget;

class MostSolvedWidget extends ChartWidget
{
    protected static ?string $heading = 'Most Solved Words';

    protected function getData(): array
    {
        $mostSolvedWords = Word::orderBy('solved_count', 'desc')->limit(5)->get();

        // Map the data for the chart
        $labels = $mostSolvedWords->pluck('word')->toArray();
        $data = $mostSolvedWords->pluck('solved_count')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Solved Count',
                    'data' => $data,
                    'backgroundColor' => [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF',
                    ]
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
