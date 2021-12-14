<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' =>  ['admin', 'auth']],function() {

    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::resource('/admin/category', 'App\Http\Controllers\CategoryController');
    Route::resource('/admin/user', 'App\Http\Controllers\UserController');
    Route::resource('/admin/product', 'App\Http\Controllers\ProductController'); 
    Route::get('/product/{product}/editprice', 'App\Http\Controllers\ProductController@edit_price')->name('product.edit_price');
    Route::patch('/product/{product}/updateprice', 'App\Http\Controllers\ProductController@update_price')->name('product.update_price');
});


Route::group(['middleware' =>  ['auth']],function() {
    Route::get('/checkout', [App\Http\Controllers\OrderController::class, 'create_order'])->name('checkout');
    Route::post('/checkout', [App\Http\Controllers\OrderController::class, 'store_order'])->name('order.store');
    Route::get('/checkout/index', [App\Http\Controllers\OrderController::class, 'checkout_index'])->name('order.index');
    Route::patch('/order/{id}', [App\Http\Controllers\OrderController::class, 'update'])->name('order.update');
    Route::delete('remove/{id}', [App\Http\Controllers\OrderController::class, 'remove'])->name('order.remove');
});

Route::get('cart', [App\Http\Controllers\ProductController::class, 'cart']);

Route::get('add-to-cart/{id}', [App\Http\Controllers\ProductController::class, 'addToCart']);
Route::patch('change-cart/{id}', [App\Http\Controllers\ProductController::class, 'change'])->name('change-cart');
Route::delete('remove-cart/{id}', [App\Http\Controllers\ProductController::class, 'remove'])->name('remove-cart');


Route::get('/', [App\Http\Controllers\ProductController::class, 'welcome'])->name('welcome');
Route::get('/details/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('details');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'Products'])->name('products');
Route::get('/Saree', [App\Http\Controllers\ProductController::class, 'Saree'])->name('Saree');
Route::get('/Salwar', [App\Http\Controllers\ProductController::class, 'Salwar'])->name('Salwar');
Route::get('/Top', [App\Http\Controllers\ProductController::class, 'Top'])->name('Top');
Route::get('/Skirt', [App\Http\Controllers\ProductController::class, 'Skirt'])->name('Skirt');
Route::get('/Blouse', [App\Http\Controllers\ProductController::class, 'Blouse'])->name('Blouse');
Route::get('/Frock', [App\Http\Controllers\ProductController::class, 'Frock'])->name('Frock');
Route::get('product/details/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('details');

Route::get('/about', function () { return view('frontend.pages.about'); })->name('about');
Route::get('/contact', function () { return view('frontend.pages.contact'); })->name('contact');