<?php

namespace App\Livewire\Components\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class Modalchange extends Component
{
    public $modalFormChange = false;

    public $id;
    public $update_data = false;

    #[On('open-modal-change')]
    public function openModal($id)
    {
        $this->id = $id;
        $this->modalFormChange = true;
    }

    public function closeModal()
    {
        $this->modalFormChange = false;
    }

    public function save()
    {
        $user = User::find($this->id);

        $user->status = !$user->status;
        $user->save();

        $this->reset();
        $this->dispatch('success', message: 'User updated successfully');
    }

    public function render()
    {
        return view('livewire.components.user.modalchange');
    }
}
