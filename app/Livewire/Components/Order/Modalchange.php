<?php

namespace App\Livewire\Components\Order;

use App\Models\Order;
use App\Models\Payment;
use Livewire\Component;
use Livewire\Attributes\On;

class Modalchange extends Component
{

    public $modalFormChange = false;

    public $id;
    public $change_status = false;

    public $status;
    public $total_amount;
    public $amount = 0;
    public $spending = 0;
    public $payment_method = 'cash';

    #[On('open-modal-change')]
    public function openModal($id)
    {
        $this->id = $id;
        $order = Order::find($id);
        $this->total_amount = number_format($order->total_amount, 0, ',', '.');
        $this->spending = number_format(($this->amount - $order->total_amount), 0, ',', '.');
        $this->modalFormChange = true;
    }

    public function save(){
        $this->validate([
            'status' => 'required',
        ]);

        \DB::beginTransaction();

        try {

            $order = Order::find($this->id);
            $order->status = $this->status;
            $order->save();

            if($this->status == 'completed'){
                Payment::create([
                    'order_id' => $this->id,
                    'amount' => $this->total_amount,
                    'payment_method' => $this->payment_method == 'qris' ? 'transfer' : 'cash'
                ]);
            }

            $this->modalFormChange = false;
            $this->reset();

            \DB::commit();

            $this->dispatch('success', message: 'Order updated status successfully');

        } catch (\Throwable $th) {
            \DB::rollBack();
            session()->flash('error', $th->getMessage());
        }


    }

    public function closeModal()
    {
        $this->modalFormChange = false;
    }

    public function render()
    {
        if($this->payment_method == 'cash'){
            if($this->amount > 0){
                // remove dot
                $this->amount = str_replace('.', '', $this->amount);
                $this->spending = str_replace('.', '', $this->spending);
                $this->total_amount = str_replace('.', '', $this->total_amount);

                // format
                $this->spending = number_format(($this->amount - $this->total_amount), 0, ',', '.');
                $this->amount = number_format($this->amount, 0, ',', '.');
                $this->total_amount = number_format($this->total_amount, 0, ',', '.');
            } else {
                $this->amount = str_replace('.', '', $this->amount);
                $this->spending = 0;
            }
        } else {
            if($this->amount > 0){
                // remove dot
                $this->total_amount = str_replace('.', '', $this->total_amount);
                $this->amount = str_replace('.', '', $this->amount);
                $this->spending = str_replace('.', '', $this->spending);

                // format
                $this->spending = number_format(($this->amount - $this->total_amount), 0, ',', '.');
                $this->amount = number_format($this->amount, 0, ',', '.');
                $this->total_amount = number_format($this->total_amount, 0, ',', '.');
            } else {
                if ($this->payment_method == 'qris') {
                    $this->amount = $this->total_amount;
                    $this->spending = 0;
                }
            }
        }


        return view('livewire.components.order.modalchange');
    }
}
