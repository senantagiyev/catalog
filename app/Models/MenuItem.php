<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class MenuItem extends Model
{
    use HasTranslations;

    public const LOCATIONS = [
        'header' => 'Header (top navigation)',
        'footer_shopping' => 'Footer — Shopping column',
        'footer_categories' => 'Footer — Categories column',
        'footer_legal' => 'Footer — Legal column',
        'footer_services' => 'Footer — Customer services',
    ];

    protected $fillable = ['location', 'parent_id', 'label', 'url', 'open_in_new_tab', 'sort_order', 'is_active'];

    public array $translatable = ['label'];

    protected function casts(): array
    {
        return [
            'open_in_new_tab' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('sort_order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public static function tree(string $location): \Illuminate\Support\Collection
    {
        static $cache = [];
        if (isset($cache[$location])) {
            return $cache[$location];
        }

        return $cache[$location] = static::query()
            ->where('location', $location)
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->with(['children' => fn ($q) => $q->where('is_active', true)->orderBy('sort_order')])
            ->orderBy('sort_order')
            ->get();
    }

    public static function clearCache(): void
    {
        // Per-request memoization only; no persistent cache to clear.
    }
}
