<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Translatable\HasTranslations;

class Translation extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['group', 'key', 'value', 'description'];

    public array $translatable = ['value'];

    public static function all_cached(): array
    {
        return Cache::rememberForever('translations.all', function () {
            return static::query()->get()->mapWithKeys(fn ($t) => [
                $t->key => $t->getTranslations('value'),
            ])->all();
        });
    }

    public static function clearCache(): void
    {
        Cache::forget('translations.all');
    }

    protected static function booted(): void
    {
        static::saved(fn () => static::clearCache());
        static::deleted(fn () => static::clearCache());
    }
}
