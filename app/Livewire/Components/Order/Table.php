<?php

namespace App\Livewire\Components\Order;

use App\Models\Order;
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

        $order = Order::find($id);

        $this->dispatch('value', [
            'customer' => $order->customer_id,
            'service' => $order->detail->service_id,
        ]);
    }

    public function changeStatus($id)
    {
        $this->dispatch('open-modal-change', $id);
    }

    public function getItems()
    {
        return Order::whereRelation('customer', 'name', 'like', '%' . $this->search . '%')
                    ->orderBy('created_at', 'desc')->paginate(10);
    }

    public function print($id){
        $this->redirectRoute('order.print', $id);
    }

    public function render()
    {
        return view('livewire.components.order.table', [
            'orders' => $this->getItems(),
        ]);
    }
}
