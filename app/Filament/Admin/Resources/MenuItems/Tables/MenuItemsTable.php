<?php

namespace App\Filament\Admin\Resources\MenuItems\Tables;

use App\Models\MenuItem;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class MenuItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->groups(['location'])
            ->columns([
                TextColumn::make('location')->badge()->sortable()
                    ->formatStateUsing(fn ($state) => MenuItem::LOCATIONS[$state] ?? $state),
                TextColumn::make('label')->searchable()
                    ->formatStateUsing(fn ($state, $record) => ($record->parent_id ? '— ' : '') . ($record->getTranslation('label', app()->getLocale(), false) ?: $record->getTranslation('label', 'az', false))),
                TextColumn::make('url')->limit(40),
                TextColumn::make('sort_order')->sortable(),
                ToggleColumn::make('is_active'),
            ])
            ->filters([
                SelectFilter::make('location')->options(MenuItem::LOCATIONS),
                TernaryFilter::make('is_active'),
            ])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }
}
