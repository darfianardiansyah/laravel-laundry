<?php

namespace App\Livewire\Components\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Hash;

class Modalform extends Component
{
    public $modalFormData = false;

    public $id;
    public $update_data = false;

    public $name;
    public $email;
    public $password;

    #[On('open-modal')]
    public function openModal()
    {
        $this->modalFormData = true;
    }

    public function closeModal()
    {
        $this->modalFormData = false;
    }

    #[On('edit-modal')]
    public function editModal($id)
    {
        $this->update_data = true;
        $this->id = $id;
        $user = User::find($id);
        $this->name = $user->name;
        $this->email = $user->email;

        $this->modalFormData = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
        ]);

        if($this->update_data){
            $user = User::find($this->id);
            $user->name = $this->name;
            $user->email = $this->email;
            if($this->password){
                $user->password = Hash::make($this->password);
            }
            $user->save();

            $this->reset();
            $this->dispatch('success', message: 'User updated successfully');
        } else {

            $this->validate([
                'password' => 'required'
            ]);

            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password)
            ]);

            $this->reset();
            $this->dispatch('success', message: 'User created successfully');
        }

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.components.user.modalform');
    }
}
