<?php

namespace App\Http\Controllers\api;

use App\Models\Purchase;
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

    public function cart()
    {
        $sneakers = Sneaker::where('is_added_to_cart', true)->get();

        return response()->json($sneakers, 200);
    }

    public function addToCart($id)
    {
        $sneaker = Sneaker::find($id);

        if (!$sneaker) {
            return response()->json(['message' => 'Sneaker not found'], 404);
        }

        $sneaker->is_added_to_cart = !$sneaker->is_added_to_cart;
        $sneaker->save();

        return response()->json(['message' => "Added to cart!"], 200);
    }

    public function purchase(Request $request)
    {
        // create record
        $validatedData = $request->validate([
            'total_price' => 'required|numeric',
            'sneakers_ids' => 'required|array',
        ]);

        $purchase = new Purchase();
        $purchase->total_price = $validatedData['total_price'];
        $purchase->sneakers_ids = $validatedData['sneakers_ids'];
        $purchase->save();

        // clear cart
        $sneakers = Sneaker::where('is_added_to_cart', true)->get();

        foreach ($sneakers as $sneaker) {
            $sneaker->is_added_to_cart = false;
            $sneaker->is_favorite = false;
            $sneaker->save();
        }

        // return response
        $sneakers = Sneaker::all();

        return response()->json([
            'purchase_id' => $purchase->id,
            'sneakers' => $sneakers,
        ], 200);
    }
}
