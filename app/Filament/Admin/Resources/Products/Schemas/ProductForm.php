<?php

namespace App\Filament\Admin\Resources\Products\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Translations')->schema([
                Tabs::make('Translations')->tabs([
                    static::translationTab('az', 'Azərbaycan'),
                    static::translationTab('en', 'English'),
                    static::translationTab('ru', 'Русский'),
                ])->columnSpanFull(),
            ]),

            Section::make('Slug & URL')->schema([
                TextInput::make('slug')->required()->unique(ignoreRecord: true)->suffixIcon('heroicon-o-link'),
            ]),

            Section::make('Pricing & Inventory')->schema([
                TextInput::make('sku')->required()->unique(ignoreRecord: true),
                TextInput::make('price')->numeric()->required()->prefix('$'),
                TextInput::make('sale_price')->numeric()->prefix('$')->nullable(),
                TextInput::make('stock')->numeric()->default(0)->required(),
            ])->columns(2),

            Section::make('Classification')->schema([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->getTranslation('name', app()->getLocale(), false) ?: $record->getTranslation('name', 'az', false))
                    ->searchable()->preload()->required(),
                Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->getTranslation('name', app()->getLocale(), false) ?: $record->getTranslation('name', 'az', false))
                    ->searchable()->preload()->nullable(),
                Select::make('colors')
                    ->relationship('colors', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->getTranslation('name', app()->getLocale(), false) ?: $record->getTranslation('name', 'az', false))
                    ->multiple()->preload(),
                Select::make('sizes')
                    ->relationship('sizes', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->code ?: $record->getTranslation('name', 'az', false))
                    ->multiple()->preload(),
                Select::make('tags')
                    ->relationship('tags', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->getTranslation('name', app()->getLocale(), false) ?: $record->getTranslation('name', 'az', false))
                    ->multiple()->preload()
                    ->createOptionForm([
                        TextInput::make('name.az')->label('Ad (AZ)')->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state ?? ''))),
                        TextInput::make('name.en')->label('Name (EN)'),
                        TextInput::make('name.ru')->label('Название (RU)'),
                        TextInput::make('slug')->required(),
                    ]),
            ])->columns(2),

            Section::make('Badges & Status')->schema([
                TextInput::make('badge_label'),
                Select::make('badge_color')->options([
                    'new' => 'New',
                    'sale' => 'Sale',
                    'hot' => 'Hot',
                    'featured' => 'Featured',
                ])->nullable(),
                TextInput::make('sort_order')->numeric()->default(0),
                Toggle::make('is_featured'),
                Toggle::make('is_new'),
                Toggle::make('is_active')->default(true),
            ])->columns(2),
        ]);
    }

    protected static function translationTab(string $locale, string $label): Tab
    {
        $upper = strtoupper($locale);

        $tab = Tab::make($upper)->schema([
            TextInput::make("name.$locale")->label("Name ($upper)")
                ->required($locale === 'az')
                ->live(onBlur: $locale === 'az')
                ->afterStateUpdated(function ($state, callable $set) use ($locale) {
                    if ($locale === 'az') {
                        $set('slug', Str::slug($state ?? ''));
                    }
                }),
            Textarea::make("short_description.$locale")->label("Short description ($upper)")->rows(3),
            RichEditor::make("description.$locale")->label("Description ($upper)"),
            TextInput::make("meta_title.$locale")->label("Meta title ($upper)"),
            Textarea::make("meta_description.$locale")->label("Meta description ($upper)")->rows(2),
        ]);

        return $tab;
    }
}
