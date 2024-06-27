<?php

namespace App\Filament\Resources\WordResource\Pages;

use App\Filament\Resources\WordResource;
use App\Filament\Resources\WordResource\Widgets\MostSolvedWords;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWords extends ListRecords
{
    protected static string $resource = WordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    

}
