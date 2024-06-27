<?php

namespace App\Filament\Resources\WordResource\Pages;

use App\Filament\Resources\WordResource;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateWord extends CreateRecord
{
    protected static string $resource = WordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('Cancel')
                ->color('info')
                ->url($this->getResource()::getUrl('index')),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }


    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Word Saved')
            ->body('The word has been saved successfully.');
    }
}
