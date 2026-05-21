<?php

namespace App\Filament\Admin\Resources\Pages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Translations')->schema([
                Tabs::make('Translations')->tabs([
                    static::translationTab('az', 'AZ', true),
                    static::translationTab('en', 'EN'),
                    static::translationTab('ru', 'RU'),
                ])->columnSpanFull(),
            ]),
            Section::make('Details')->schema([
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
                FileUpload::make('image')->image()->disk('public')->directory('pages'),
                Toggle::make('is_active')->default(true),
            ])->columns(2),
        ]);
    }

    protected static function translationTab(string $locale, string $upper, bool $primary = false): Tab
    {
        return Tab::make($upper)->schema([
            TextInput::make("title.$locale")->label("Title ($upper)")
                ->required($primary)
                ->live(onBlur: $primary)
                ->afterStateUpdated(function ($state, callable $set) use ($primary) {
                    if ($primary) {
                        $set('slug', Str::slug($state ?? ''));
                    }
                }),
            RichEditor::make("content.$locale")->label("Content ($upper)"),
            TextInput::make("meta_title.$locale")->label("Meta title ($upper)"),
            Textarea::make("meta_description.$locale")->label("Meta description ($upper)")->rows(2),
        ]);
    }
}
