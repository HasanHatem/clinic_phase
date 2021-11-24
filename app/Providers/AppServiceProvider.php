<?php

namespace App\Providers;

use App\Language;
use App\Setting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App as FacadesApp;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!Schema::hasTable('languages')) {
            return ;
        }

        if (FacadesApp::environment('production')) {
            $this->app->bind('path.public', function() {
                return base_path('../public_html');
            });
        }

        $current_lang = App::getLocale();
        $current_lang_name = '';
        $languages = Language::get();

        $langs = [];

        foreach ($languages as $lang) {
            array_push($langs, $lang->slug);
            if ($current_lang == $lang->slug) {
                $current_lang_name = $lang->name;
            }
        }

        Config::set('app.languages', $langs);

        // set locale
        setLang();

        $settings = Setting::with('translation')->first();

        View::share([
            'languages' => $languages,
            'current_lang_name' => $current_lang_name,
            'settings' => $settings
        ]);
    }
}
