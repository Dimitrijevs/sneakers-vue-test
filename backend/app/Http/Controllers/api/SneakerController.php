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
}