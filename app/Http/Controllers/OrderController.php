<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order');
    }

    public function print($id)
    {
        $order = Order::find($id);

        return view('printorder', compact('order'));
    }
}
