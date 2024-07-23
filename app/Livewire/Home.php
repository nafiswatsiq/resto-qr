<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{
    #[On('qr-scanned')]
    public function qrScanned($qr)
    {
        if ($qr === 'menu') {
            return redirect()->route($qr);
        }else{
            return redirect()->route('home');
        }
    }
    public function render()
    {
        return view('livewire.home');
    }
}
