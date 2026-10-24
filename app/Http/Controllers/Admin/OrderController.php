<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(10);
        return view('auth.orders.index', compact('orders'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        session()->flash('success', 'Заявка ' . $order->name . ' удалена');
        return redirect()->route('orders.index');
    }

}
