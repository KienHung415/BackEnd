<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function getAllMenus()
    {
        $menus = Menu::all();
        return response()->json($menus);
    }
}