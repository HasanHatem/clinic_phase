<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Treatment;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     *
     */
    public function index()
    {
        $treatments = Treatment::with('translation')->limit(6)->get();
        $doctors = Doctor::with('translation')->where('status', 1)->limit(8)->get();

        return view('welcome', compact('treatments', 'doctors'));
    }
}
