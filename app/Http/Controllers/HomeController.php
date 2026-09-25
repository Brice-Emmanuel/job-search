<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ArtisanProfile;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $topArtisans = ArtisanProfile::with(['user', 'category'])
            ->where('disponible', true)
            ->take(6)
            ->get();

        return view('home', compact('categories', 'topArtisans'));
    }
}
