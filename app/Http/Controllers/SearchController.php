<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiHat;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return response()->json([]);
        }

        $results = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('artist', 'LIKE', "%{$query}%")
            ->orWhere('genre', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($results);
    }
}