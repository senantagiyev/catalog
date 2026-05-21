<?php

namespace App\Filament\Admin\Resources\BlogPosts\Tables;

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

class BlogPostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('published_at', 'desc')
            ->columns([
                ImageColumn::make('image')->disk('public')->square(),
                TextColumn::make('title')
                    ->formatStateUsing(fn ($state, $record) => $record->getTranslation('title', app()->getLocale(), false) ?: $record->getTranslation('title', 'az', false))
                    ->searchable(),
                TextColumn::make('category.name')->label('Category')
                    ->formatStateUsing(fn ($state, $record) => $record->category?->getTranslation('name', app()->getLocale(), false)),
                ToggleColumn::make('is_published'),
                TextColumn::make('published_at')->dateTime()->sortable(),
                TextColumn::make('author.name')->label('Author')->toggleable(),
            ])
            ->filters([
                SelectFilter::make('blog_category_id')->relationship('category', 'name')->searchable()->preload(),
                TernaryFilter::make('is_published'),
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
