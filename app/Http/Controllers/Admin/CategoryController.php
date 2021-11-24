<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     *
     */
    public function index()
    {
        $categories = Category::latest()->paginate(25);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     *
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     *
     */
    public function store(Request $request)
    {
        $data_translation = [];

        $languages = Language::get();

        foreach ($languages as $language) {
            $valid = $request->validate([
                $language->slug.'_name' => ['required', 'min:2', 'max:191', 'string'],
                $language->slug.'_slug' => ['required', 'min:2', 'max:191', 'string', 'unique:category_translations,slug'],
            ]);

            array_push($data_translation, $valid);
        }

        if ($category = Category::create()) {

            $index = 0;

            foreach ($languages as $language) {
                $category->translation($language->slug)->update([
                    'name' => $data_translation[$index][$language->slug.'_name'],
                    'slug' => $data_translation[$index][$language->slug.'_slug']
                ]);

                ++$index;
            }

            return redirect()->route('admin.categories.index')->with('success', 'Category has been added successfully.');
        }
        return redirect()->route('admin.categories.index')->with('failed', 'ERROR, please try again.');
    }

    /**
     *
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     *
     */
    public function update(Category $category, Request $request)
    {
        $data_translation = [];

        $languages = Language::get();

        foreach ($languages as $language) {
            $valid = $request->validate([
                $language->slug.'_name' => ['required', 'min:2', 'max:191', 'string'],
                $language->slug.'_slug' => ['required', 'min:2', 'max:191', 'string', 'unique:category_translations,slug,'.$category->translation($language->slug)->first()->id],
            ]);

            array_push($data_translation, $valid);
        }

        $index = 0;

        foreach ($languages as $language) {
            $category->translation($language->slug)->update([
                'name' => $data_translation[$index][$language->slug.'_name'],
                'slug' => $data_translation[$index][$language->slug.'_slug']
            ]);

            ++$index;
        }

        return redirect()->route('admin.categories.index')->with('success', 'Category has been modified successfully.');
    }

    /**
     *
     */
    public function delete(Category $category)
    {
        if ($category->delete()) {
            return redirect()->route('admin.categories.index')->with('success', 'Category has been deleted successfully.');
        }
    }
}
