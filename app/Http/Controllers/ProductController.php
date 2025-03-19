<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\NguoiDung;
use App\Models\Product;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:nguoidung,TenDangNhap',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|string|email|max:255|unique:nguoidung,Email',
        ]);

        $user = new NguoiDung();
        $user->TenDangNhap = $request->username;
        $user->MatKhau = Hash::make($request->password);
        $user->Email = $request->email;
        $user->save();

        return redirect()->route('register')->with('success', 'Tạo tài khoản thành công!');
    }

    public function login(Request $request)
    {
        $credentials = [
            'TenDangNhap' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('nguoidung')->attempt($credentials)) {
            return redirect()->away('http://localhost:5173/');
        }

        return redirect()->back()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng');
    }

    public function logout(Request $request)
    {
        Auth::guard('nguoidung')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Đăng xuất thành công'], 200);
    }
}

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return response()->json([]);
        }

        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('artist', 'LIKE', "%{$query}%")
            ->orWhere('genre', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($products);
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->artist = $request->artist;
        $product->genre = $request->genre;
        $product->file_path = $request->file_path;
        $product->save();

        return response()->json(['message' => 'Product created successfully'], 201);
    }

    public function getSongsByCategory($menu_id)
    {
        $songs = Product::where('menu_id', $menu_id)->where('active', 1)->get();
        return response()->json($songs);
    }
}