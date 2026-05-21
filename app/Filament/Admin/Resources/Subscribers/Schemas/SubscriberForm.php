<?php

namespace App\Filament\Admin\Resources\Subscribers\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SubscriberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()->schema([
                TextInput::make('email')->email()->required()->unique(ignoreRecord: true),
                Toggle::make('is_active')->default(true),
                DateTimePicker::make('subscribed_at')->default(now()),
                DateTimePicker::make('unsubscribed_at')->nullable(),
            ])->columns(2),
        ]);
    }
}
