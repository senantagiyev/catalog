<?php

namespace App\Filament\Admin\Resources\Categories\Tables;

use App\Models\Category;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                ImageColumn::make('image')->disk('public')->square(),
                TextColumn::make('name')->searchable()->sortable()
                    ->formatStateUsing(fn ($state, $record) => $record->getTranslation('name', app()->getLocale(), false) ?: $record->getTranslation('name', 'az', false)),
                TextColumn::make('parent.name')->label('Parent')
                    ->formatStateUsing(fn ($state, $record) => $record->parent?->getTranslation('name', app()->getLocale(), false))
                    ->toggleable(),
                TextColumn::make('sort_order')->sortable(),
                ToggleColumn::make('is_active'),
                ToggleColumn::make('is_featured'),
                TextColumn::make('updated_at')->dateTime()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_active'),
                SelectFilter::make('parent_id')
                    ->label('Parent')
                    ->options(fn () => Category::query()->whereNull('parent_id')->get()->mapWithKeys(fn ($c) => [$c->id => $c->getTranslation('name', 'az', false)])->all()),
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
