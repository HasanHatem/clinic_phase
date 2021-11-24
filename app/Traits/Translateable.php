<?php

namespace App\Traits;

use Illuminate\Support\Facades\Config;

trait Translateable
{
    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $languages = Config::get('app.languages');

            if ($model->translation == null) {
                foreach ($languages as $language) {
                    $model->translation()->create([
                        'locale' => $language
                    ]);
                }
            }
        });

    }
}
