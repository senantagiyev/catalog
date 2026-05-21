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
