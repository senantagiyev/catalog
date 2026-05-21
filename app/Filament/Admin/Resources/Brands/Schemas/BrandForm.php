<?php

namespace App\Filament\Admin\Resources\Brands\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Translations')->schema([
                Tabs::make('Translations')->tabs([
                    Tab::make('AZ')->schema([
                        TextInput::make('name.az')->label('Ad (AZ)')->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state ?? ''))),
                        Textarea::make('description.az')->rows(4),
                    ]),
                    Tab::make('EN')->schema([
                        TextInput::make('name.en')->label('Name (EN)'),
                        Textarea::make('description.en')->rows(4),
                    ]),
                    Tab::make('RU')->schema([
                        TextInput::make('name.ru')->label('Название (RU)'),
                        Textarea::make('description.ru')->rows(4),
                    ]),
                ])->columnSpanFull(),
            ]),
            Section::make('Details')->schema([
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
                TextInput::make('website')->url(),
                TextInput::make('sort_order')->numeric()->default(0),
            ])->columns(2),
            Section::make('Media')->schema([
                FileUpload::make('logo')->image()->disk('public')->directory('brands'),
            ]),
            Section::make('Status')->schema([
                Toggle::make('is_active')->default(true),
                Toggle::make('is_featured'),
            ])->columns(2),
        ]);
    }
}
