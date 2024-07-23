<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCount()
    {
        $cartSession = session('cart_session');
        $count = Cart::where('session', $cartSession)->count();
        return response()->json(['count' => $count]);
    }
}
