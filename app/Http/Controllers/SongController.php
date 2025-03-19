<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Menu;

class SongController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return response()->json([]);
        }

        $songs = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('artist', 'LIKE', "%{$query}%")
            ->orWhere('genre', 'LIKE', "%{$query}%")
            ->get(['id', 'name', 'artist', 'genre', 'file_path']);

        return response()->json($songs);
    }
    public function getSongs()
    {
        $songs = Product::where('active', 1)->get();
        return response()->json($songs);
    }

    public function index()
    {
        $songs = Product::all()->map(function ($song) {
            $song->thumb = url('storage/' . $song->thumb);
            return $song;
        });

        return response()->json($songs);
    }

    public function getCategories()
    {
        $categories = Menu::all();
        return response()->json($categories);
    }
}