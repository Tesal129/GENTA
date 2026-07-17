<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $featuredEdukasi = \App\Models\Edukasi::where('is_featured', true)->first();
        return view('landingpage', compact('featuredEdukasi'));
    }
}