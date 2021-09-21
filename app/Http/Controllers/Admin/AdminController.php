<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function makeLogin(Request $request){
        $data = array(
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'admin'
        );
        if(Auth::attempt($data)){
            return redirect()->route('admin.dashboard');
        }else{
            return back()->with('error', 'Invalid email or password');
        }
    }

    public function dashboard(){
        return view('admin.layouts.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
