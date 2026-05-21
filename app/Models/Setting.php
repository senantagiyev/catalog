<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['group', 'key', 'value', 'type', 'is_translatable'];

    protected function casts(): array
    {
        return [
            'value' => 'array',
            'is_translatable' => 'boolean',
        ];
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return Cache::rememberForever("setting:$key", function () use ($key, $default) {
            $setting = static::query()->where('key', $key)->first();

            if (! $setting) {
                return $default;
            }

            $value = $setting->value;

            if ($setting->is_translatable && is_array($value)) {
                return $value[app()->getLocale()] ?? $value[config('app.fallback_locale')] ?? $default;
            }

            return $value ?? $default;
        });
    }

    public static function set(string $key, mixed $value, string $group = 'general', string $type = 'string', bool $translatable = false): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group, 'type' => $type, 'is_translatable' => $translatable]
        );
        Cache::forget("setting:$key");
    }

    protected static function booted(): void
    {
        static::saved(fn (Setting $s) => Cache::forget("setting:{$s->key}"));
        static::deleted(fn (Setting $s) => Cache::forget("setting:{$s->key}"));
    }
}
