<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login',['title'=>'Đăng nhập hệ thống']);
    }
    public function store(Request $request) {
        
        $request->validate([
            'email' => 'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt([
        'email'=>$request->input('email'),
        'password'=>$request->input('password'),

        ],$request->input('remember'))){
            
            return redirect()->route('admin');

        }
        Session::flash('error','Email hoặc Password không đúng');
        return redirect()->back();
    }
     
}