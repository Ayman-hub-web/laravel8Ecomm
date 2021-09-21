<?php

namespace App\Http\Controllers;

use App\Models\ProductBooking;
use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;
use Session;
use Omnipay\Omnipay;

class ProductBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart_id = $request->cart_id;
        foreach($cart_id as $c_id){
            $cart_fetch = Cart::where('id',$c_id)->first();
            $productBook = new ProductBooking();
            $productBook->user_id = $cart_fetch->user_id;
            $productBook->product_id = $cart_fetch->product_id;
            $productBook->qty = $cart_fetch->qty;
            $productBook->payment_status = 0;
            $productBook->save();
        }
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductBooking  $productBooking
     * @return \Illuminate\Http\Response
     */
    public function show(ProductBooking $productBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductBooking  $productBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductBooking $productBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductBooking  $productBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductBooking $productBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductBooking  $productBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductBooking $productBooking)
    {
        //
    }
}
