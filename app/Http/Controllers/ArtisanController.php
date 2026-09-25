<?php

namespace App\Http\Controllers;

use App\Models\ArtisanProfile;
use App\Models\Category;
use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    public function index(Request $request)
    {
        $query = ArtisanProfile::with(['user', 'category'])->where('disponible', true);

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('ville')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('ville', 'like', '%' . $request->ville . '%');
            });
        }

        if ($request->filled('quartier')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('quartier', 'like', '%' . $request->quartier . '%');
            });
        }

        $artisans = $query->paginate(9);
        $categories = Category::all();

        return view('artisans.index', compact('artisans', 'categories'));
    }

    public function show($id)
    {
        // Récupère l'artisan avec sa catégorie, son profil utilisateur et ses avis clients
        $artisan = ArtisanProfile::with(['user', 'category', 'reviews.client'])->findOrFail($id);
        
        return view('artisans.show', compact('artisan'));
    }
}
