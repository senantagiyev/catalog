<?php

namespace App\Filament\Admin\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                ImageColumn::make('images.path')->label('Image')->disk('public')->square()->limit(1),
                TextColumn::make('name')->label('Name')->searchable()
                    ->formatStateUsing(fn ($state, $record) => $record->getTranslation('name', app()->getLocale(), false) ?: $record->getTranslation('name', 'az', false)),
                TextColumn::make('sku')->searchable()->sortable(),
                TextColumn::make('category.name')->label('Category')
                    ->formatStateUsing(fn ($state, $record) => $record->category?->getTranslation('name', app()->getLocale(), false))
                    ->toggleable(),
                TextColumn::make('brand.name')->label('Brand')
                    ->formatStateUsing(fn ($state, $record) => $record->brand?->getTranslation('name', app()->getLocale(), false))
                    ->toggleable(),
                TextColumn::make('price')->money('USD')->sortable(),
                TextColumn::make('sale_price')->money('USD')->placeholder('—')->sortable(),
                TextColumn::make('stock')->sortable()
                    ->color(fn ($state) => $state < 10 ? 'danger' : 'success')
                    ->weight('bold'),
                ToggleColumn::make('is_featured'),
                ToggleColumn::make('is_active'),
                TextColumn::make('sort_order')->sortable()->toggleable(),
            ])
            ->filters([
                SelectFilter::make('category_id')->relationship('category', 'name')->searchable()->preload(),
                SelectFilter::make('brand_id')->relationship('brand', 'name')->searchable()->preload(),
                TernaryFilter::make('is_active'),
                TernaryFilter::make('is_featured'),
                TernaryFilter::make('is_new'),
                Filter::make('has_discount')
                    ->label('Has discount')
                    ->query(fn ($query) => $query->whereNotNull('sale_price')->whereColumn('sale_price', '<', 'price'))
                    ->toggle(),
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
