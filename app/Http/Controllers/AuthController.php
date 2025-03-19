<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\NguoiDung;

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