<?php

use App\Livewire\Home;
use App\Livewire\Menu;
use App\Livewire\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Livewire\CompleteOrder;

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
