<?php

namespace App\Livewire\Components\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Table extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search;

    public function openModal()
    {
        $this->dispatch('open-modal');
    }

    #[On('success')]
    public function messageSuccess($message)
    {
        $this->resetPage();
        session()->flash('success', $message);
    }

    public function edit($id)
    {
        $this->dispatch('edit-modal', $id);
    }

    public function changeStatus($id)
    {
        $this->dispatch('open-modal-change', $id);
    }

    public function getItems()
    {
        return User::where('name', 'like', '%' . $this->search . '%')
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
    }


    public function render()
    {
        return view('livewire.components.user.table', [
            'users' => $this->getItems()
        ]);
    }
}
