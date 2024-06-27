<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Word;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FactsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Words', Word::count()),
            Stat::make('Total Solved Words', Word::sum('solved_count')),
            Stat::make('Last Sloved Word', Word::orderBy('updated_at', 'desc')->first()->word ?? 'N/A'),
            Stat::make('Popular word to solve', Word::orderBy('solved_count', 'desc')->first()->word ?? 'N/A'),

        ];
    }
}
