<?php

namespace App\Filament\Admin\Resources\Categories\Schemas;

use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CategoryForm
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
                        Textarea::make('description.az')->label('Təsvir (AZ)')->rows(4),
                    ]),
                    Tab::make('EN')->schema([
                        TextInput::make('name.en')->label('Name (EN)'),
                        Textarea::make('description.en')->label('Description (EN)')->rows(4),
                    ]),
                    Tab::make('RU')->schema([
                        TextInput::make('name.ru')->label('Название (RU)'),
                        Textarea::make('description.ru')->label('Описание (RU)')->rows(4),
                    ]),
                ])->columnSpanFull(),
            ]),
            Section::make('Details')->schema([
                Select::make('parent_id')
                    ->label('Parent Category')
                    ->options(fn () => Category::query()->pluck('name', 'id')->map(fn ($n) => is_array($n) ? ($n['az'] ?? reset($n)) : $n))
                    ->searchable()
                    ->nullable(),
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
                TextInput::make('icon')->label('Icon name')->placeholder('heroicon-o-tag'),
                TextInput::make('sort_order')->numeric()->default(0),
            ])->columns(2),
            Section::make('Media')->schema([
                FileUpload::make('image')->image()->disk('public')->directory('categories'),
            ]),
            Section::make('Status')->schema([
                Toggle::make('is_active')->default(true),
                Toggle::make('is_featured'),
            ])->columns(2),
        ]);
    }
}
