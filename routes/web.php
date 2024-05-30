<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AppController::class,'index'])->name('app.index');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/product/{slug}',[ShopController::class,'productDetails'])->name('shop.product.details');


Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::post('/cart/store',[CartController::class,'addToCart'])->name('cart.store');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::patch('cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::post('cart/applyCoupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/my-account',[UserController::class,'index'])->name('user.index');
});
Route::middleware(['auth','auth.admin'])->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
});


Route::get('admin/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('admin/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('admin/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('admin/products', [ProductController::class, 'index'])->name('products.index');
Route::get('admin/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('admin/products', [ProductController::class, 'store'])->name('products.store');
Route::get('admin/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit'); 
Route::put('admin/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');

Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::get('/checkout1',[CheckoutController::class,'index'])->name('checkout.index');
Route::post('/promo/apply', 'PromoController@apply')->name('promo.apply');

Route::get('/about',[AboutController::class,'index'])->name('about.index');
Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
Route::get('/contact',[ContactController::class,'index'])->name('contact.index');

