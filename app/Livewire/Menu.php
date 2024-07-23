<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Str;
use WireUi\Traits\WireUiActions;
use App\Models\Menu as ModelsMenu;

class Menu extends Component
{
    use WireUiActions;

    public $menus;

    public function mount()
    {
        $this->menus = ModelsMenu::all();
    }

    public function addToCart($id)
    {
        $cartSession = session('cart_session');

        if($cartSession) {
            $check = Cart::where('session', $cartSession)->where('menu_id', $id)->first();

            if($check) {
                Cart::where('session', $cartSession)->where('menu_id', $id)->update([
                    'qty' => $check->qty + 1
                ]);
            }else {
                Cart::create([
                    'session' => $cartSession,
                    'menu_id' => $id
                ]);
            }
        }else {
            $session = Str::random(40);
            Cart::create([
                'session' => $session,
                'menu_id' => $id
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

    public function render()
    {
        return view('livewire.menu');
    }
}
