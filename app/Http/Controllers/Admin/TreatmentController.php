<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Language;
use App\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TreatmentController extends Controller
{
    /**
     *
     */
    public function index()
    {
        $treatments = Treatment::with('translation')->latest()->paginate(25);
        return view('admin.treatments.index', compact('treatments'));
    }

    /**
     *
     */
    public function create()
    {
        $categories = Category::with('translation')->get();
        return view('admin.treatments.create', compact('categories'));
    }

    /**
     *
     */
    public function store(Request $request)
    {
        $data = [];

        $request->validate([
            'image' => ['required', 'mimes:jpeg,png,jpg', 'max:3072'],
            'category_id' => ['required', 'integer', 'exists:categories,id']
        ]);

        $data['category_id'] = $request->category_id;

        $data_translation = [];

        $languages = Language::get();

        foreach ($languages as $language) {
            $valid = $request->validate([
                $language->slug.'_name'        => ['required', 'string', 'min:3', 'max:191'],
                $language->slug.'_slug'        => ['required', 'string', 'min:3', 'max:191', 'unique:treatment_translations,slug'],
                $language->slug.'_description' => [],
            ]);

            array_push($data_translation, $valid);
        }

        if ($treatment = Treatment::create($data)) {
            if ($request->hasFile('image')) {
                $img = $request->image->store('treatments', 'public');

                $treatment->update([
                    'image' => $img
                ]);
            }

            $index = 0;

            foreach ($languages as $language) {
                $treatment->translation($language->slug)->update([
                    'name'        => $data_translation[$index][$language->slug.'_name'],
                    'slug'        => $data_translation[$index][$language->slug.'_slug'],
                    'description' => $data_translation[$index][$language->slug.'_description']
                ]);

                ++$index;
            }

            return redirect()->route('admin.treatments.index')->with('success', 'Treatment has been added successfully.');
        }

        return redirect()->route('admin.treatments.index')->with('failed', 'ERROR, please try again.');
    }

    /**
     *
     */
    public function edit(Treatment $treatment)
    {
        $categories = Category::with('translation')->get();
        return view('admin.treatments.edit', compact('treatment', 'categories'));
    }

    /**
     *
     */
    public function update(Request $request, Treatment $treatment)
    {
        $data = [];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['max:3072', 'mimes:jpeg,png,jpg']
            ]);
        }

        $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id']
        ]);

        $data['category_id'] = $request->category_id;

        $data_translation = [];

        $languages = Language::get();

        foreach ($languages as $language) {
            $valid = $request->validate([
                $language->slug.'_name'        => ['required', 'string', 'min:3', 'max:191'],
                $language->slug.'_slug'        => ['required', 'string', 'min:3', 'max:191', 'unique:treatment_translations,slug,'.$treatment->translation($language->slug)->first()->id],
                $language->slug.'_description' => [],
            ]);

            array_push($data_translation, $valid);
        }

        if ($treatment->update($data)) {
            if ($request->hasFile('image')) {
                if (Storage::exists($treatment->image)) {
                    Storage::delete($treatment->image);
                }

                $img = $request->image->store('treatments', 'public');

                $treatment->update([
                    'image' => $img
                ]);
            }

            $index = 0;

            foreach ($languages as $language) {
                $treatment->translation($language->slug)->update([
                    'name'        => $data_translation[$index][$language->slug.'_name'],
                    'slug'        => $data_translation[$index][$language->slug.'_slug'],
                    'description' => $data_translation[$index][$language->slug.'_description']
                ]);

                ++$index;
            }

            return redirect()->route('admin.treatments.index')->with('success', 'Treatment has been modified successfully.');
        }

        return redirect()->route('admin.treatments.index')->with('failed', 'ERROR, please try again.');
    }

    /**
     *
     */
    public function delete(Treatment $treatment)
    {
        if ($treatment->delete() && Storage::delete($treatment->image)) {
            return redirect()->route('admin.treatments.index')->with('success', 'Treatment has been deleted successfully.');
        }

        return redirect()->route('admin.treatments.index')->with('failed', 'ERROR, please try again.');
    }
}
