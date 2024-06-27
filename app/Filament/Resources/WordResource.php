<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WordResource\Pages;
use App\Filament\Resources\WordResource\RelationManagers;
use App\Filament\Resources\WordResource\Widgets\MostSolvedWords;
use App\Models\Word;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WordResource extends Resource
{
    protected static ?string $model = Word::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Word')
                    ->icon('heroicon-o-bookmark')
                    ->schema([
                        TextInput::make('word')
                            ->label('Word')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('Enter the word'),

                        Textarea::make('hint')
                            ->label('Hint')
                            ->placeholder('Enter the hint')
                            ->rows(3)
                            ->required(),
                ]),
                Section::make('Category')
                    ->icon('heroicon-o-tag')
                    ->schema([
                        Select::make('category_id')
                        ->label('Category')
                        ->relationship('category', 'name')
                        ->required()
                        ->searchable()
                        ->columnSpan(2)
                        ->preload(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('word')
                    ->label('Word')
                    ->description(fn (Word $word) => $word->hint)
                    ->searchable(),

                TextColumn::make('category.name')
                    ->label('Category')
                    ->badge()
                    ->searchable(),

                TextColumn::make('solved_count')
                    ->label('Solved Count')
                    ->sortable()
                    ->numeric(),


                TextColumn::make('created_at')
                    ->label('Created At')
                    ->since(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->recordUrl(false);
    }


    public static function getRelations(): array
    {
        return [
        ];
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWords::route('/'),
            'create' => Pages\CreateWord::route('/create'),
            // 'edit' => Pages\EditWord::route('/{record}/edit'),
        ];
    }
}
