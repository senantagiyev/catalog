<?php

namespace App\Filament\Admin\Resources\BlogPosts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
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

class BlogPostForm
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
                FileUpload::make('image')->image()->disk('public')->directory('blog'),
                Select::make('blog_category_id')
                    ->relationship('category', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->getTranslation('name', app()->getLocale(), false) ?: $record->getTranslation('name', 'az', false))
                    ->searchable()->preload()->required(),
                Select::make('user_id')
                    ->relationship('author', 'name')
                    ->searchable()->preload()
                    ->default(fn () => auth()->id()),
            ])->columns(2),
            Section::make('Publishing')->schema([
                Toggle::make('is_published'),
                DateTimePicker::make('published_at')->default(now()),
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
            Textarea::make("excerpt.$locale")->label("Excerpt ($upper)")->rows(3),
            RichEditor::make("content.$locale")->label("Content ($upper)"),
            TextInput::make("meta_title.$locale")->label("Meta title ($upper)"),
            Textarea::make("meta_description.$locale")->label("Meta description ($upper)")->rows(2),
        ]);
    }
}
