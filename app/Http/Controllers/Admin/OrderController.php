<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 'o')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->First();
        return view('admin.orders.view', compact('orders'));
    }

    public function updateOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->input('order_status');
        $order->update();

        return redirect('orders')->with('status', "Order Updated Successfully!");
    }

    public function orderHistory()
    {
        $orders = Order::where('status', '1')->get();
        return view('admin.orders.history', compact('orders'));
    }
}
