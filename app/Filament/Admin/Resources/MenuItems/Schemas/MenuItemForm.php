<?php

namespace App\Filament\Admin\Resources\MenuItems\Schemas;

use App\Models\MenuItem;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class MenuItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Placement')->schema([
                Select::make('location')->options(MenuItem::LOCATIONS)->required()->native(false),
                Select::make('parent_id')
                    ->label('Parent (optional)')
                    ->relationship('parent', 'id', fn ($query, $get) => $query
                        ->whereNull('parent_id')
                        ->when($get('location'), fn ($q, $loc) => $q->where('location', $loc)))
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->getTranslation('label', 'az', false) ?: $record->getTranslation('label', 'en', false))
                    ->searchable()
                    ->preload(),
            ])->columns(2),
            Section::make('Label translations')->schema([
                Tabs::make('label')->tabs([
                    Tab::make('AZ')->schema([TextInput::make('label.az')->label('Etiket (AZ)')->required()]),
                    Tab::make('EN')->schema([TextInput::make('label.en')->label('Label (EN)')]),
                    Tab::make('RU')->schema([TextInput::make('label.ru')->label('Метка (RU)')]),
                ])->columnSpanFull(),
            ]),
            Section::make('Link')->schema([
                TextInput::make('url')->placeholder('https://... or /products')->helperText('Leave empty for a non-clickable parent (just a label).'),
                Toggle::make('open_in_new_tab'),
                TextInput::make('sort_order')->numeric()->default(0),
                Toggle::make('is_active')->default(true),
            ])->columns(2),
        ]);
    }
}
