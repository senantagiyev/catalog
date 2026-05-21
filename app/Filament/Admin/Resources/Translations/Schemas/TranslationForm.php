<?php

namespace App\Filament\Admin\Resources\Translations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class TranslationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Açar məlumatları')
                ->columns(2)
                ->schema([
                    TextInput::make('key')
                        ->label('Açar (key)')
                        ->required()
                        ->maxLength(255)
                        ->helperText('Məsələn: nav.home, common.search')
                        ->unique(ignoreRecord: true),
                    TextInput::make('group')
                        ->label('Qrup')
                        ->default('common')
                        ->datalist(['common', 'navigation', 'home', 'product', 'filter', 'contact', 'footer', 'pagination', 'empty', 'error']),
                    TextInput::make('description')
                        ->label('Təsvir')
                        ->columnSpanFull(),
                ]),

            Section::make('Dəyərlər')->schema([
                Tabs::make('Dillər')->tabs([
                    Tab::make('AZ')->schema([
                        Textarea::make('value.az')
                            ->label('Azərbaycanca')
                            ->required()
                            ->rows(3),
                    ]),
                    Tab::make('EN')->schema([
                        Textarea::make('value.en')
                            ->label('English')
                            ->rows(3),
                    ]),
                    Tab::make('RU')->schema([
                        Textarea::make('value.ru')
                            ->label('Русский')
                            ->rows(3),
                    ]),
                ]),
            ]),
        ]);
    }
}
