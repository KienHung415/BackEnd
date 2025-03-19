<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Product;

class CategoryController extends Controller
{
    public function getCategoriesWithSongs()
    {
        $categories = Menu::with(['songs' => function($query) {
            $query->where('active', 1);
        }])->get();

        return response()->json($categories);
    }
}