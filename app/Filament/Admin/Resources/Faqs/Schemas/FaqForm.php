<?php

namespace App\Filament\Admin\Resources\Faqs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Translations')->schema([
                Tabs::make('Translations')->tabs([
                    Tab::make('AZ')->schema([
                        TextInput::make('question.az')->label('Sual (AZ)')->required(),
                        Textarea::make('answer.az')->label('Cavab (AZ)')->rows(4)->required(),
                    ]),
                    Tab::make('EN')->schema([
                        TextInput::make('question.en')->label('Question (EN)'),
                        Textarea::make('answer.en')->label('Answer (EN)')->rows(4),
                    ]),
                    Tab::make('RU')->schema([
                        TextInput::make('question.ru')->label('Вопрос (RU)'),
                        Textarea::make('answer.ru')->label('Ответ (RU)')->rows(4),
                    ]),
                ])->columnSpanFull(),
            ]),
            Section::make('Settings')->schema([
                TextInput::make('sort_order')->numeric()->default(0),
                Toggle::make('is_active')->default(true),
            ])->columns(2),
        ]);
    }
}
