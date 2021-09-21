<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\ProductBookingController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function () {
//     return view('/');
// });
Route::get('/user-login', [BaseController::class, 'userLogin'])->name('user-login');
Route::post('/user-login', [BaseController::class, 'userCheck'])->name('user-check');
Route::get('/user-logout', [BaseController::class, 'logout'])->name('user-logout');
Route::get('/user-register', [BaseController::class, 'userRegister'])->name('user-register');
Route::post('/user-store', [BaseController::class, 'userStore'])->name('user-store');
Route::get('/home', [BaseController::class, 'home'])->name('home');
Route::get('/special-offer', [BaseController::class, 'specialoffer'])->name('specialoffer');
Route::get('/delivery', [BaseController::class, 'delivery'])->name('delivery');
Route::get('/product/productView/{id}', [BaseController::class, 'productView'])->name('product.productView');
Route::get('/contact-us', [BaseController::class, 'contactus'])->name('contactus');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/1', [ProductController::class, 'productDeatils'])->name('productsDetails');

Route::get('/cart', [CartController::class, 'index'])->name('cart');

//Admin
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'makeLogin'])->name('admin.makeLogin');
Route::middleware(['auth'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    //Category
    Route::resource('admin/category', CategoryController::class);
    //Product
    Route::resource('admin/product', ProductsController::class);
    Route::get('admin/product/details/{id}', [ProductsController::class, 'extraDetails'])->name('product.extraDetails');
    Route::post('admin/product/details/store', [ProductsController::class, 'storeExtraDetails'])->name('product.storeExtraDetails');
    //Users
    Route::resource('admin/user', UserController::class);
    //cart
    Route::resource('cart', CartController::class);
    Route::get('delete', [CartController::class, 'del'])->name('cart.delete');
    //ProductBooking
    Route::post('product-booking/store', [ProductBookingController::class, 'store'])->name('productBooking.store');
    //stripe 
    Route::get('stripe', [StripePaymentController::class, 'stripe'])->name('stripe');
    Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');
});