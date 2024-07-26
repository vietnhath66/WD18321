<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postLogin(Request $req)
    {
        $dataUserLogin = [
            'email' => $req->email,
            'password' => $req->password,
        ];
        if (Auth::attempt($dataUserLogin)) {
            if (Auth::user()->role == 1) {
                return redirect()->route('admin.products.listProducts')->with([
                    'message' => 'Đăng nhập thành công!!!'
                ]);
            } else {
                echo "User";
            }
        } else {
            return redirect()->route('login')->with([
                'message' => 'Đăng nhập thất bại???'
            ]);
        }
    }
}
