<?php

namespace App\Filament\Admin\Pages;

use App\Models\Setting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string|\UnitEnum|null $navigationGroup = 'Configuration';

    protected static ?string $navigationLabel = 'Settings';

    protected static ?string $title = 'Site Settings';

    protected string $view = 'filament.admin.pages.manage-settings';

    public ?array $data = [];

    /**
     * Definition of which settings exist, grouped and typed.
     *
     * Keys map to keys in the settings table. The `translatable` flag controls
     * how the value is stored (array-keyed by locale vs raw).
     */
    protected array $definitions = [
        'general' => [
            'site_name' => ['translatable' => true, 'type' => 'string'],
            'logo' => ['translatable' => false, 'type' => 'string'],
            'favicon' => ['translatable' => false, 'type' => 'string'],
            'primary_color' => ['translatable' => false, 'type' => 'string'],
        ],
        'contact' => [
            'phone' => ['translatable' => false, 'type' => 'string'],
            'email' => ['translatable' => false, 'type' => 'string'],
            'address' => ['translatable' => true, 'type' => 'string'],
            'working_hours' => ['translatable' => true, 'type' => 'string'],
        ],
        'social' => [
            'facebook' => ['translatable' => false, 'type' => 'string'],
            'instagram' => ['translatable' => false, 'type' => 'string'],
            'twitter' => ['translatable' => false, 'type' => 'string'],
            'tiktok' => ['translatable' => false, 'type' => 'string'],
        ],
        'seo' => [
            'meta_title' => ['translatable' => true, 'type' => 'string'],
            'meta_description' => ['translatable' => true, 'type' => 'string'],
        ],
    ];

    public function mount(): void
    {
        $data = [];
        foreach ($this->definitions as $group => $keys) {
            foreach ($keys as $key => $def) {
                $setting = Setting::query()->where('key', $key)->first();
                $value = $setting?->value;
                if ($def['translatable']) {
                    $value = is_array($value) ? $value : [];
                    foreach (['az', 'en', 'ru'] as $locale) {
                        $data[$group][$key][$locale] = $value[$locale] ?? '';
                    }
                } else {
                    $data[$group][$key] = is_array($value) ? ($value['value'] ?? null) : $value;
                }
            }
        }
        $this->form->fill($data);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Tabs::make('Settings')->tabs([
                    Tab::make('General')->schema([
                        Section::make('Brand')->schema([
                            ...$this->translatableInputs('general.site_name', 'Site name'),
                            FileUpload::make('general.logo')->image()->disk('public')->directory('settings'),
                            FileUpload::make('general.favicon')->image()->disk('public')->directory('settings'),
                            ColorPicker::make('general.primary_color'),
                        ]),
                    ]),
                    Tab::make('Contact')->schema([
                        Section::make('Contact info')->schema([
                            TextInput::make('contact.phone'),
                            TextInput::make('contact.email')->email(),
                            ...$this->translatableInputs('contact.address', 'Address', textarea: true),
                            ...$this->translatableInputs('contact.working_hours', 'Working hours'),
                        ]),
                    ]),
                    Tab::make('Social')->schema([
                        Section::make('Social URLs')->schema([
                            TextInput::make('social.facebook')->url(),
                            TextInput::make('social.instagram')->url(),
                            TextInput::make('social.twitter')->url(),
                            TextInput::make('social.tiktok')->url(),
                        ]),
                    ]),
                    Tab::make('SEO')->schema([
                        Section::make('Default SEO')->schema([
                            ...$this->translatableInputs('seo.meta_title', 'Meta title'),
                            ...$this->translatableInputs('seo.meta_description', 'Meta description', textarea: true),
                        ]),
                    ]),
                ])->columnSpanFull(),
            ]);
    }

    protected function translatableInputs(string $key, string $label, bool $textarea = false): array
    {
        $out = [];
        foreach (['az' => 'AZ', 'en' => 'EN', 'ru' => 'RU'] as $locale => $upper) {
            $field = $textarea
                ? Textarea::make("$key.$locale")->rows(3)
                : TextInput::make("$key.$locale");
            $out[] = $field->label("$label ($upper)");
        }
        return $out;
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')->label('Save settings')->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();
        foreach ($this->definitions as $group => $keys) {
            foreach ($keys as $key => $def) {
                $value = $data[$group][$key] ?? null;
                Setting::set($key, $value, $group, $def['type'], $def['translatable']);
            }
        }
        Notification::make()->title('Settings saved')->success()->send();
    }
}

