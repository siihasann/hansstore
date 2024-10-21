<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Product\Index as ProductIndex;
use App\Http\Livewire\Shop\Index as ShopIndex;
use App\Http\Livewire\Shop\Cart as CartIndex;
use App\Http\Livewire\Shop\Checkout as CheckoutIndex;
use App\Http\Livewire\Admin\Dashboard as AdminDashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\User as AdminUser;
use App\Http\Livewire\PublicShopIndex ;

// use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop', PublicShopIndex::class)
        ->name('public.shop');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)
        ->name('admin.dashboard');
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/product', ProductIndex::class)
        ->name('admin.product')
        ->middleware('admin'); // Menggunakan middleware 'admin' yang sudah ada

    Route::get('/shop/auth', ShopIndex::class)
        ->name('shop.index');
    
    Route::get('/cart', CartIndex::class)
        ->name('cart.index');
    
    Route::get('/chekout', CheckoutIndex::class)
        ->name('checkout.index');
});

Route::middleware('auth') ->group(function () {
    Route::get('admin/user', AdminUser::class)
        ->name('admin.user');

});
require __DIR__.'/auth.php';