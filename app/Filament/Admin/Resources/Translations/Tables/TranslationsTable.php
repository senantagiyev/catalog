<?php

namespace App\Filament\Admin\Resources\Translations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TranslationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('group')
                    ->label('Qrup')
                    ->badge()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('key')
                    ->label('Açar')
                    ->copyable()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('value.az')
                    ->label('AZ')
                    ->limit(40)
                    ->getStateUsing(fn ($record) => $record->getTranslation('value', 'az', false))
                    ->wrap(),
                TextColumn::make('value.en')
                    ->label('EN')
                    ->limit(40)
                    ->getStateUsing(fn ($record) => $record->getTranslation('value', 'en', false))
                    ->wrap(),
                TextColumn::make('value.ru')
                    ->label('RU')
                    ->limit(40)
                    ->getStateUsing(fn ($record) => $record->getTranslation('value', 'ru', false))
                    ->wrap(),
                TextColumn::make('updated_at')
                    ->label('Yenilənib')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('group')
            ->filters([
                SelectFilter::make('group')
                    ->label('Qrup')
                    ->options(fn () => \App\Models\Translation::query()->distinct()->pluck('group', 'group')->all()),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
