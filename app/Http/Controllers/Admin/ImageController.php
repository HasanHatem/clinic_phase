<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     *
     */
    public function index()
    {
        $images = Image::paginate(25);

        return view('admin.images.index', compact('images'));
    }

    /**
     *
     */
    public function create()
    {
        return view('admin.images.create');
    }

    /**
     *
     */
    public function store(Request $request)
    {
        $data = [];

        if ($request->has('image_alt')) {
            if ($request->image_alt !== null) {
                $request->validate([
                    'image_alt' => ['required', 'string']
                ]);
            }

            $data['image_alt'] = $request->image_alt;
        }

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['required', 'max:3072', 'mimes:jpeg,png,jpg']
            ]);
        }

        if ($image = Image::create($data)) {
            if ($request->hasFile('image')) {
                $img = $request->image->store('gallery', 'public');

                $image->update([
                    'image' => $img
                ]);
            }

            return redirect()->route('admin.images.index')->with('success', 'User has been added successfully.');
        }

        return redirect()->route('admin.images.index')->with('failed', 'ERROR, Please try again.');
    }

    /**
     *
     */
    public function edit(Image $image)
    {
        return view('admin.images.edit', compact('image'));
    }

    /**
     *
     */
    public function update(Image $image, Request $request)
    {
        $data = [];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['required', 'max:3072', 'mimes:jpeg,png,jpg']
            ]);
        }

        if ($request->has('image_alt')) {
            $request->validate([
                'image_alt' => ['required', 'string']
            ]);

            $data['image_alt'] = $request->image_alt;
        }

        if ($image->update($data)) {

            if ($request->hasFile('image')) {
                if (Storage::delete($image->image)) {
                    $img = $request->image->store('gallery', 'public');

                    $image->update([
                        'image' => $img
                    ]);
                }
            }
            return redirect()->route('admin.images.index')->with('success', 'Image has been modified successfully.');
        }

        return redirect()->route('admin.images.index')->with('failed', 'ERROR, Please try again.');
    }

    /**
     *
     */
    public function delete(Image $image)
    {
        if ($image->delete() && Storage::delete($image->image)) {
            return redirect()->route('admin.images.index')->with('success', 'User has been deleted successfully.');
        }

        return redirect()->route('admin.images.index')->with('failed', 'ERROR, Please try again.');
    }
}
