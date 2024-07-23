<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use WireUi\Traits\WireUiActions;
use Livewire\Attributes\Validate;

class CompleteOrder extends Component
{
    use WireUiActions;
    public $carts;
    public $total;

    #[Validate('required|min:5')]
    public $name;

    #[Validate('required')]
    public $tableNumber;

    public function mount()
    {
        $this->carts = Cart::where('session', session('cart_session'))->get();
        foreach ($this->carts as $cart) {
            $this->total += $cart->menu->price * $cart->qty;
        }
    }

    public function removeItem($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        $this->carts = Cart::where('session', session('cart_session'))->get();

        $this->dispatch('cart-updated');
    }

    public function returnToMenu()
    {
        return redirect()->route('menu');
    }

    public function order()
    {
        $this->validate();

        $orderNumber = Order::where('created_at', '>=', now()->startOfDay())
            ->where('created_at', '<=', now()->endOfDay())
            ->count() + 1;

        $order = Order::create([
            'order_number' => $orderNumber,
            'name' => $this->name,
            'table_number' => $this->tableNumber,
            'status' => 'dipesan',
        ]);

        foreach ($this->carts as $cart) {
            $order->orderMenu()->attach($cart->menu_id, ['qty' => $cart->qty]);
        }

        Cart::where('session', session('cart_session'))->delete();
        session()->forget('cart_session');

        $this->dispatch('cart-updated');

        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Berhasil!',
            'description' => 'Orderan berhasil dibuat.',
            'onClose' => [
                'method' => 'back',
                'params' => 'onClose',
            ],
        ]);
    }

    public function back()
    {
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.complete-order');
    }
}
