<?php

namespace App\Http\Controllers;

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

        return view('welcome', compact('treatments'));
    }
}
