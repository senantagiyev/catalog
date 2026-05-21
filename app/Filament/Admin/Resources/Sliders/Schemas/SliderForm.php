<?php

namespace App\Filament\Admin\Resources\Sliders\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class SliderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Translations')->schema([
                Tabs::make('Translations')->tabs([
                    static::translationTab('az', 'AZ'),
                    static::translationTab('en', 'EN'),
                    static::translationTab('ru', 'RU'),
                ])->columnSpanFull(),
            ]),
            Section::make('Media')->schema([
                FileUpload::make('image')->image()->disk('public')->directory('sliders')->required(),
                FileUpload::make('mobile_image')->image()->disk('public')->directory('sliders'),
            ])->columns(2),
            Section::make('Link & Placement')->schema([
                TextInput::make('link')->url(),
                Select::make('position')->options([
                    'hero' => 'Hero',
                    'middle' => 'Middle',
                    'bottom' => 'Bottom',
                    'category_top' => 'Category Top',
                ])->required()->default('hero'),
                TextInput::make('sort_order')->numeric()->default(0),
                Toggle::make('is_active')->default(true),
            ])->columns(2),
            Section::make('Scheduling')->schema([
                DateTimePicker::make('starts_at')->nullable(),
                DateTimePicker::make('ends_at')->nullable(),
            ])->columns(2),
        ]);
    }

    protected static function translationTab(string $locale, string $upper): Tab
    {
        return Tab::make($upper)->schema([
            TextInput::make("title.$locale")->label("Title ($upper)")->required($locale === 'az'),
            TextInput::make("subtitle.$locale")->label("Subtitle ($upper)"),
            TextInput::make("button_text.$locale")->label("Button text ($upper)"),
        ]);
    }
}
