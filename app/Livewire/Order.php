<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Menu;
use Livewire\Component;
use Illuminate\Support\Str;
use WireUi\Traits\WireUiActions;
use Livewire\Attributes\Validate;
use App\Models\Order as ModelsOrder;

class Order extends Component
{
    use WireUiActions;
    
    public $menu;

    #[Validate('required')]
    public $quantity = 1;

    #[Validate('required|min:5')]
    public $name;

    #[Validate('required')]
    public $tableNumber;

    public function mount($slug)
    {
        try {
            $this->menu = Menu::where('slug', $slug)->firstOrFail();
        } catch (\Exception $e) {
            $this->notification()->send([
                'icon' => 'error',
                'title' => 'Error Notification!',
                'description' => 'Woops, its an error.',
            ]);

            return redirect()->route('home');
        }
    }

    public function increment()
    {
        $this->quantity++;
    }

    public function decrement()
    {
        if ($this->quantity <= 1) {
            return;
        }
        $this->quantity--;
    }

    public function order()
    {
        $this->validate();
        
        $orderNumber = ModelsOrder::where('created_at', '>=', now()->startOfDay())
            ->where('created_at', '<=', now()->endOfDay())
            ->count() + 1;

        $order = ModelsOrder::create([
            'order_number' => $orderNumber,
            'name' => $this->name,
            'table_number' => $this->tableNumber,
            'status' => 'dipesan',
        ]);

        $order->orderMenu()->attach($this->menu->id, ['qty' => $this->quantity]);

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

    public function addToCart()
    {
        $cartSession = session('cart_session');

        if ($cartSession) {
            $check = Cart::where('session', $cartSession)->where('menu_id', $this->menu->id)->first();

            if ($check) {
                Cart::where('session', $cartSession)->where('menu_id', $this->menu->id)->update([
                    'qty' => $check->qty + $this->quantity,
                ]);
            } else {
                Cart::create([
                    'session' => $cartSession,
                    'menu_id' => $this->menu->id,
                    'qty' => $this->quantity,
                ]);
            }
        } else {
            $session = Str::random(40);
            Cart::create([
                'session' => $session,
                'menu_id' => $this->menu->id,
                'qty' => $this->quantity,
            ]);

            session(['cart_session' => $session]);
        }

        $this->notification()->send([
            'icon' => 'success',
            'title' => 'Berhasil!',
            'description' => 'Menu berhasil dimasukan ke keranjang.',
        ]);

        $this->dispatch('cart-updated');
    }

    public function back()
    {
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.order', [
            'menu' => $this->menu,
        ]);
    }
}
