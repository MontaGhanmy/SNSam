<?php
use Spatie\Valuestore\Valuestore;

function settings($key = null, $default = null)
{
    $settings = Valuestore::make(storage_path('app/settings.json'));
    if ($key === null) {
        return $settings;
    }

    return $settings->get($key, $default);
}
