<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{
    #[On('qr-scanned')]
    public function qrScanned($qr)
    {
        return redirect()->route('order', $qr);
    }
    public function render()
    {
        return view('livewire.home');
    }
}
