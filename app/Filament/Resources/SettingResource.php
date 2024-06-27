<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('support_email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('support_phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('facebook')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('twitter')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('instagram')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('linkedin')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('youtube')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('whatsapp')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('github')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('support_email'),
                Tables\Columns\TextColumn::make('support_phone'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('facebook'),
                Tables\Columns\TextColumn::make('twitter'),
                Tables\Columns\TextColumn::make('instagram'),
                Tables\Columns\TextColumn::make('linkedin'),
                Tables\Columns\TextColumn::make('youtube'),
                Tables\Columns\TextColumn::make('whatsapp'),
                Tables\Columns\TextColumn::make('github')

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->recordUrl(false);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
        ];
    }
}
