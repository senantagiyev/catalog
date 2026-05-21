<?php

namespace App\Filament\Admin\Resources\Sizes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class SizeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Translations')->schema([
                Tabs::make('Translations')->tabs([
                    Tab::make('AZ')->schema([TextInput::make('name.az')->label('Ad (AZ)')->required()]),
                    Tab::make('EN')->schema([TextInput::make('name.en')->label('Name (EN)')]),
                    Tab::make('RU')->schema([TextInput::make('name.ru')->label('Название (RU)')]),
                ])->columnSpanFull(),
            ]),
            Section::make('Details')->schema([
                TextInput::make('code')->required()->maxLength(20),
                TextInput::make('sort_order')->numeric()->default(0),
                Toggle::make('is_active')->default(true),
            ])->columns(2),
        ]);
    }
}
