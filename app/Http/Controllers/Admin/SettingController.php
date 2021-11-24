<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use App\Language;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     *
     */
    public function edit()
    {
        $settings = Setting::first();
        $about = About::first();
        return view('admin.settings.edit', compact('settings', 'about'));
    }

    /**
     *
     */
    public function update(Request $request)
    {
        if ($request->has('facebook') && $request->facebook != '') {
            $request->validate([
                'facebook' => ['url', 'string', 'max:191']
            ]);
        }

        if ($request->has('instagram') && $request->instagram != '') {
            $request->validate([
                'instagram' => ['url', 'string', 'max:191']
            ]);
        }

        if ($request->has('mobile_number') && $request->mobile_number != '') {
            $request->validate([
                'mobile_number' => ['string', 'max:191']
            ]);
        }

        $data = [
            'facebook'      => $request->facebook,
            'instagram'     => $request->instagram,
            'mobile_number' => $request->mobile_number,
        ];

        $languages = Language::get();

        $data_translation = [];

        foreach ($languages as $language) {
            $valid = $request->validate([
                $language->slug.'_name' => ['required', 'string', 'min:2', 'max:191'],
                $language->slug.'_description' => []
            ]);

            array_push($data_translation, $valid);
        }

        $setting = Setting::first();

        if ($setting->update($data)) {
            $index = 0;

            foreach ($languages as $language) {
                $setting->translation($language->slug)->update([
                    'name' => $data_translation[$index][$language->slug.'_name'],
                    'description' => $data_translation[$index][$language->slug.'_description'],
                ]);

                ++$index;
            }

            return redirect()->route('admin.settings.edit')->with('success', 'Settings has been modified successfully.');
        }
    }
}
