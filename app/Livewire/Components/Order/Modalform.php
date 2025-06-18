<?php

namespace App\Livewire\Components\Order;

use App\Models\Order;
use App\Models\Service;
use Livewire\Component;
use App\Models\Customer;
use App\Models\OrderDetail;
use Livewire\Attributes\On;

class Modalform extends Component
{

    public $modalFormData = false;

    public $id;
    public $update_data = false;

    public $customer;
    public $service;
    public $weight = 0;
    public $amount = 0;

    #[On('open-modal')]
    public function openModal()
    {
        $this->modalFormData = true;
    }

    public function closeModal()
    {
        $this->modalFormData = false;
    }

    public function getCustomers()
    {
        return Customer::all();
    }

    public function getServices()
    {
        return Service::all();
    }

    #[On('edit-modal')]
    public function editModal($id)
    {
        $this->id = $id;
        $this->update_data = true;
        $this->modalFormData = true;

        $order = Order::find($id);
        $this->customer = $order->customer_id;
        $this->service = $order->detail->service_id;
        $this->weight = $order->detail->weight;
        $this->amount = $order->detail->subtotal;
    }

    public function save()
    {
        $this->validate([
            'customer' => 'required',
            'service' => 'required',
            'weight' => 'required|numeric',
        ]);

        \DB::beginTransaction();

        try {

            if($this->update_data){
                $order = Order::find($this->id);
                $order->update([
                    'customer_id' => $this->customer,
                    'total_amount' => $this->amount
                ]);

                $order->detail->update([
                    'service_id' => $this->service,
                    'weight' => $this->weight,
                    'subtotal' => $this->amount
                ]);

                $this->reset();
                $this->dispatch('success', message: 'Order updated successfully');
            } else {
                $order = Order::create([
                    'customer_id' => $this->customer,
                    'total_amount' => $this->amount
                ]);

                OrderDetail::create([
                    'order_id' => $order->id,
                    'service_id' => $this->service,
                    'weight' => $this->weight,
                    'subtotal' => $this->amount
                ]);

                $this->reset();
                $this->dispatch('success', message: 'Order created successfully');
            }


            \DB::commit();

            $this->closeModal();

        } catch (\Throwable $th) {
            \DB::rollBack();
            session()->flash('error', $th->getMessage());
        }

    }

    public function render()
    {
        if($this->service && $this->weight){
            $service = Service::find($this->service);
            $this->amount = $this->weight * $service->price;
        }


        return view('livewire.components.order.modalform', [
            'customers' => $this->getCustomers(),
            'services' => $this->getServices(),

        ]);
    }
}
