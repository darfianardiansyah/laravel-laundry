<?php

namespace App\Livewire\Components\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class Widget extends Component
{
    public $user = [];

    public function mount()
    {
        $this->user = User::all();
    }

    #[On('success')]
    public function messageSuccess($message)
    {
        $this->user = User::all();
    }

    public function render()
    {
        return view('livewire.components.user.widget');
    }
}
