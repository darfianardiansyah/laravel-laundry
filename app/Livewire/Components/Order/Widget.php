<?php

namespace App\Livewire\Components\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\On;

class Widget extends Component
{
    public $order = [];

    public function mount()
    {
        $this->order = Order::all();
    }

    #[On('success')]
    public function messageSuccess($message)
    {
        $this->order = Order::all();
    }

    public function render()
    {
        return view('livewire.components.order.widget');
    }
}
