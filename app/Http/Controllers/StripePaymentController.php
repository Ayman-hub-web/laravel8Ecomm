<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use Auth;
use App\Models\ProductBooking;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        $productBookings = ProductBooking::where('user_id', Auth::id())->where('payment_status', 0)->get();
        $total_price = 0;
        foreach($productBookings as $productBook){
            $total_price += $productBook->product->price*$productBook->qty;
        }
        $total_price *= 100;
        return view('stripe', compact('total_price'));
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->amount,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);

        $carts = Cart::where('user_id', Auth::id())->get();
        foreach($carts as $cart){
            $cart->delete();
        }

        DB::table('product_bookings')
              ->where('user_id', Auth::id())
              ->update(['payment_status' => 1]);

        Session::flash('success', 'Payment successful!');
          
        return back();
    }
}
