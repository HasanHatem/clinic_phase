<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     *
     */
    public function update(Request $request)
    {
        $data_translation = [];

        $languages = Language::get();

        foreach ($languages as $language) {
            $valid = $request->validate([
                $language->slug.'_about' => []
            ]);

            array_push($data_translation, $valid);
        }

        $about = About::first();

        if (!$about) {
            $about = About::create();
        }

        $index = 0;

        foreach ($languages as $language) {
            $about->translation($language->slug)->update([
                'about' => $data_translation[$index][$language->slug.'_about'],
            ]);

            ++$index;
        }

        return redirect()->route('admin.settings.edit')->with('success', 'About page has been modified successfully.');
    }
}
