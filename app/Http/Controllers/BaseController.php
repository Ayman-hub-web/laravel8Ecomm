<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class BaseController extends Controller
{
    public function home(){
        $parentCategories = Category::whereNull('category_id')->get();
        $products = Product::all();
        $latest_products = Product::latest()->take(6)->get();
        return view('frontend.home', compact('products', 'latest_products', 'parentCategories'));
    } 

    public function contactus(){
        return view('frontend.contactus');
    } 

    public function delivery(){
        return view('frontend.delivery');
    } 

    public function specialoffer(){
        return view('frontend.specialoffer');
    }
    
    public function productView($id){
        $product = Product::find($id);
        $category_id = $product->category_id;
        $related_products = Product::where('category_id', $category_id)->limit(6)->get();
        return view('frontend.products.details', compact('product', 'related_products'));
    }

    public function userLogin(){
        return view('frontend.login');
    }

    public function userCheck(Request $request){
        $data = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if(Auth::attempt($data)){
            return redirect()->route('home');
        }else{
            return redirect()->back()->with('message', 'Invalid email or password');
        }
    }

    public function userRegister(){
        return view('frontend.register');
    }

    public function userStore(Request $request){
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        );

        User::create($data);
        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('user-login');
    }
}
