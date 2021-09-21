<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(){
        return view('frontend.register');
    }

    public function makeRegister(Request $request){
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'repeat_password' => 'required',
        ]);

        if($request->password == $request->repeat_password){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'user';
            $user->save();
            return redirect()->route();
        }
    }
}
