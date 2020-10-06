<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $status = ['new', 'processing', 'pilot', 'done'];
        return view('admin.order.edit', compact('order', 'status'));
    }

    public function update(Request $request, Order $order)
    {
        $this->validate($request, [
            'status'=> 'required|in:new,processing,pilot,done',
            'shipping' => 'required|numeric'
        ]);
        $order->update([
            'status'=> $request->status,
            'shipping' => $request->shipping,
        ]);
        return redirect()->route('admin.orders.index')->with(['message'=> 'Order Status Updated Successfully', 'icon'=>'success']);
    }

}
