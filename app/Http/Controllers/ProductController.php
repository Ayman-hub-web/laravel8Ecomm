<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('frontend.products.products');
    }

    public function productDeatils(){
        return view('frontend.products.details');
    }
}
