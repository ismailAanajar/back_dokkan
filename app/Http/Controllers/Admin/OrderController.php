<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
         return $order;
    }

    public function show($id)
    {
    }
    public function changeStatus(Request $request,$id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'status' => $request->status
        ]); 
    }


}