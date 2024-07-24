<?php

use App\Livewire\Home;
use App\Livewire\Menu;
use App\Livewire\Order;
use App\Livewire\CompleteOrder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CartController;

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

Route::get('/', Home::class)->name('home');
Route::get('/menu', Menu::class)->name('menu');
Route::get('/menu/{slug}', Order::class)->name('order');
Route::get('/order-confirm', CompleteOrder::class)->name('order.confirm');
Route::get('/cart/count', [CartController::class, 'getCount']);

Route::get('/optimize', function () {
    Artisan::call('optimize');
    return 'Optimized';
});

Route::get('/migrate-fresh', function () {
    Artisan::call('migrate:fresh');
    return 'Migrated';
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage linked';
});
