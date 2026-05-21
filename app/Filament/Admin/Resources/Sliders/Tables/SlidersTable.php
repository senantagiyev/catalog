<?php

namespace App\Filament\Admin\Resources\Sliders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class SlidersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                ImageColumn::make('image')->disk('public'),
                TextColumn::make('title')
                    ->formatStateUsing(fn ($state, $record) => $record->getTranslation('title', app()->getLocale(), false) ?: $record->getTranslation('title', 'az', false))
                    ->searchable(),
                TextColumn::make('position')->badge(),
                TextColumn::make('sort_order')->sortable(),
                ToggleColumn::make('is_active'),
                TextColumn::make('starts_at')->dateTime()->toggleable(),
                TextColumn::make('ends_at')->dateTime()->toggleable(),
            ])
            ->filters([
                SelectFilter::make('position')->options([
                    'hero' => 'Hero',
                    'middle' => 'Middle',
                    'bottom' => 'Bottom',
                    'category_top' => 'Category Top',
                ]),
                TernaryFilter::make('is_active'),
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
