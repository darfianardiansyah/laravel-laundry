<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        // get data order last 7 days
        $orders = Order::whereDate('created_at', '>=', now()->subDays(10))->get();

        // get list date last 10 days
        $today = now();
        $dates = collect();
        $startDate = $today->copy()->subDays(10);
        $endDate = $today;

        for ($i = 10; $i >= 0; $i--) {
            $dates->push($today->copy()->subDays($i)->format('d F Y'));
        }

        $categories = $dates->map(fn ($date) => Carbon::parse($date)->format('d F Y'))->toArray();

        $sales = [];
        foreach ($dates as $date) {
            $sales[] = Order::whereDate('created_at', date('Y-m-d', strtotime($date)))
                            ->where('status', 'completed')
                            ->sum('total_amount');
        }

        return view('dashboard', compact('orders', 'categories', 'sales'));
    }
}
