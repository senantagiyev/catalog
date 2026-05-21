<?php

namespace App\Filament\Admin\Resources\Products\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ImagesRelationManager extends RelationManager
{
    protected static string $relationship = 'images';

    protected static ?string $title = 'Images';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            FileUpload::make('path')->image()->disk('public')->directory('products')->required()->columnSpanFull(),
            Select::make('color_id')->relationship('color', 'name')
                ->getOptionLabelFromRecordUsing(fn ($record) => $record->getTranslation('name', app()->getLocale(), false) ?: $record->getTranslation('name', 'az', false))
                ->searchable()->preload()->nullable(),
            TextInput::make('alt_text'),
            TextInput::make('sort_order')->numeric()->default(0),
            Toggle::make('is_primary'),
            Toggle::make('is_hover'),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                ImageColumn::make('path')->disk('public')->square(),
                TextColumn::make('color.name')
                    ->formatStateUsing(fn ($state, $record) => $record->color?->getTranslation('name', app()->getLocale(), false))
                    ->placeholder('—'),
                TextColumn::make('alt_text')->limit(30),
                IconColumn::make('is_primary')->boolean(),
                IconColumn::make('is_hover')->boolean(),
                TextColumn::make('sort_order')->sortable(),
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
