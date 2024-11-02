<?php

namespace App\Http\Controllers\api;

use App\Models\Sneaker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SneakerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('title', '');
        $sortOrder = $request->query('sortOrder', 'no_sort');

        $query = Sneaker::query();

        if (!empty($search)) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        if ($sortOrder === 'cheapest') {
            $query->orderBy('price', 'asc');
        } else if ($sortOrder === 'expensive') {
            $query->orderBy('price', 'desc');
        }

        $sneakers = $query->get();

        return response()->json($sneakers, 200);
    }

    public function favorites()
    {
        $sneakers = Sneaker::where('is_favorite', true)->get();

        return response()->json($sneakers, 200);
    }

    public function addToFavorites($id)
    {
        $sneaker = Sneaker::find($id);

        if (!$sneaker) {
            return response()->json(['message' => 'Sneaker not found'], 404);
        }

        $sneaker->is_favorite = !$sneaker->is_favorite;
        $sneaker->save();

        return response()->json(['message' => "Added to favorites!"], 200);
    }
}