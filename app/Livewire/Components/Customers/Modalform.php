<?php

namespace App\Livewire\Components\Customers;

use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\On;

class Modalform extends Component
{
    public $modalFormData = false;

    public $name;
    public $email;
    public $phone_number;
    public $address;

    public $id;
    public $update_data = false;

    #[On('open-modal')]
    public function openModal()
    {
        $this->modalFormData = true;
    }

    public function closeModal()
    {
        $this->modalFormData = false;
        $this->reset();
    }

    #[On('edit-modal')]
    public function editModal($id)
    {
        $this->modalFormData = true;
        $this->id = $id;
        $this->update_data = true;

        $customer = Customer::find($id);
        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->phone_number = $customer->phone_number;
        $this->address = $customer->address;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone_number' => 'required|numeric',
            'address' => 'required|string'
        ]);

        if($this->update_data){
            $customer = Customer::find($this->id);
            $customer->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone_number' => $this->phone_number,
                'address' => $this->address
            ]);
            $this->dispatch('success', message: 'Customer updated successfully');
            $this->reset();
        } else {
            $customer = Customer::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone_number' => $this->phone_number,
                'address' => $this->address
            ]);
            $this->dispatch('success', message: 'Customer created successfully');
            $this->reset();
        }

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.components.customers.modalform');
    }
}
