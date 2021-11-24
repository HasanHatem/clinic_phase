<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     *
     */
    public function index()
    {
        $doctors = Doctor::latest()->paginate(25);

        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     *
     */
    public function create()
    {
        return view('admin.doctors.create');
    }

    /**
     *
     */
    public function store(Request $request)
    {
        $data = [];

        $request->validate([
            'image' => ['required', 'mimes:jpeg,png,jpg', 'max:3072'],
            'status' => ['required', 'integer', 'min:0', 'max:2'],
        ]);

        $data['status'] = $request->status;

        $data_translation = [];

        $languages = Language::get();

        foreach ($languages as $language) {
            $valid = $request->validate([
                $language->slug.'_name'        => ['required', 'string', 'min:3', 'max:191'],
                $language->slug.'_slug'        => ['required', 'string', 'min:3', 'max:191', 'unique:doctor_translations,slug'],
                $language->slug.'_description' => [],
            ]);

            array_push($data_translation, $valid);
        }

        if ($doctor = Doctor::create($data)) {
            if ($request->hasFile('image')) {
                $img = $request->image->store('doctors', 'public');

                $doctor->update([
                    'image' => $img
                ]);
            }

            $index = 0;

            foreach ($languages as $language) {
                $doctor->translation($language->slug)->update([
                    'name'        => $data_translation[$index][$language->slug.'_name'],
                    'slug'        => $data_translation[$index][$language->slug.'_slug'],
                    'description' => $data_translation[$index][$language->slug.'_description']
                ]);

                ++$index;
            }

            return redirect()->route('admin.doctors.index')->with('success', 'Doctor has been added successfully.');
        }

        return redirect()->route('admin.doctors.index')->with('failed', 'ERROR, please try again.');
    }

    /**
     *
     */
    public function edit(Doctor $doctor)
    {
        return view('admin.doctors.edit', compact('doctor'));
    }

    /**
     *
     */
    public function update(Doctor $doctor, Request $request)
    {
        $data = [];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['max:3072', 'mimes:jpeg,png,jpg']
            ]);
        }

        $request->validate([
            'status' => ['required', 'integer', 'min:0', 'max:2'],
        ]);

        $data['status'] = $request->status;

        $data_translation = [];

        $languages = Language::get();

        foreach ($languages as $language) {
            $valid = $request->validate([
                $language->slug.'_name'        => ['required', 'string', 'min:3', 'max:191'],
                $language->slug.'_slug'        => ['required', 'string', 'min:3', 'max:191', 'unique:doctor_translations,slug,'.$doctor->translation($language->slug)->first()->id],
                $language->slug.'_description' => [],
            ]);

            array_push($data_translation, $valid);
        }

        if ($doctor->update($data)) {
            if ($request->hasFile('image')) {
                if (Storage::exists($doctor->image)) {
                    Storage::delete($doctor->image);
                }

                $img = $request->image->store('doctors', 'public');

                $doctor->update([
                    'image' => $img
                ]);
            }

            $index = 0;

            foreach ($languages as $language) {
                $doctor->translation($language->slug)->update([
                    'name'        => $data_translation[$index][$language->slug.'_name'],
                    'slug'        => $data_translation[$index][$language->slug.'_slug'],
                    'description' => $data_translation[$index][$language->slug.'_description']
                ]);

                ++$index;
            }

            return redirect()->route('admin.doctors.index')->with('success', 'Doctor has been modified successfully.');
        }

        return redirect()->route('admin.doctors.index')->with('failed', 'ERROR, please try again.');
    }

    /**
     *
     */
    public function delete(Doctor $doctor)
    {
        if ($doctor->delete() && Storage::delete($doctor->image)) {
            return redirect()->route('admin.doctors.index')->with('success', 'Doctor has been deleted successfully.');
        }

        return redirect()->route('admin.doctors.index')->with('failed', 'ERROR, please try again.');
    }
}
