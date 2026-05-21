<?php

namespace App\Filament\Admin\Resources\Brands\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class BrandsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                ImageColumn::make('logo')->disk('public')->square(),
                TextColumn::make('name')->searchable()->sortable()
                    ->formatStateUsing(fn ($state, $record) => $record->getTranslation('name', app()->getLocale(), false) ?: $record->getTranslation('name', 'az', false)),
                TextColumn::make('website')->url(fn ($state) => $state)->openUrlInNewTab()->toggleable(),
                TextColumn::make('sort_order')->sortable(),
                ToggleColumn::make('is_active'),
                ToggleColumn::make('is_featured'),
            ])
            ->filters([
                TernaryFilter::make('is_active'),
                TernaryFilter::make('is_featured'),
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
