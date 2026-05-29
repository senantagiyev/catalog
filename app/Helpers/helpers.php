<?php

use App\Models\Translation;

if (! function_exists('t')) {
    /**
     * Translate a static key using the Translation module.
     * Falls back to the default text if key doesn't exist.
     */
    function t(string $key, ?string $default = null, ?string $locale = null): string
    {
        $locale ??= app()->getLocale();
        $fallback = config('app.fallback_locale', 'en');
        $translations = Translation::all_cached();

        if (! isset($translations[$key])) {
            return $default ?? $key;
        }

        $values = $translations[$key];

        return $values[$locale] ?? $values[$fallback] ?? $default ?? $key;
    }
}

if (! function_exists('setting')) {
    function setting(string $key, mixed $default = null): mixed
    {
        return \App\Models\Setting::get($key, $default);
    }
}

if (! function_exists('media')) {
    /**
     * Resolve a stored media path (uploaded via the public disk) to a public URL.
     * Returns the given value untouched if it already looks absolute, or a fallback
     * asset path is empty.
     */
    function media(?string $path, ?string $fallback = null): string
    {
        if ($path === null || $path === '') {
            return $fallback ? asset($fallback) : '';
        }
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, '/')) {
            return $path;
        }
        // Static theme assets shipped in /public are referenced as-is.
        if (str_starts_with($path, 'assets/')) {
            return asset($path);
        }
        // Otherwise treat as a file on the public storage disk (Filament uploads).
        return \Illuminate\Support\Facades\Storage::disk('public')->url($path);
    }
}
