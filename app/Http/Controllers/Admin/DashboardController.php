<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $mount_today = Order::whereDate('created_at', date('Y-m-d'))->sum('total');
        $mount_month = Order::whereMonth('created_at', '=', date('m'))->sum('total');
        $mount_year = Order::whereYear('created_at', '=', date('Y'))->sum('total');
        $order_today = Order::whereDate('created_at', date('Y-m-d'))->count();
        $order_month = Order::whereMonth('created_at', '=', date('m'))->count();
        $order_year = Order::whereYear('created_at', '=', date('Y'))->count();

        $total_orders =collect($orders)->count();
        $pending_orders = collect($orders)->where('status', 'pending')->count();
        $processing_orders = collect($orders)->where('status', 'processing')->count();
        $completed_orders = collect($orders)->where('status', 'delivered')->count();    
        $cancelled_orders = collect($orders)->where('status', 'cancelled')->count();
        $rejected_orders = collect($orders)->where('status', 'rejected')->count();
        $customers = User::paginate(10);
         $verified_users = collect($customers)->whereNull('verify_token')->count(); 
        $unverified_users = collect($customers)->whereNotNull('verify_token')->count();
        $total_users = collect($customers)->count();

        $cats = Category::all();
         $categories = collect($cats)->map(function ($item) {
            return $item->name;
        });
         $products_on_category = collect($cats)->map(function ($item) {
            return $item->products()->count();
        });
          /**
           * [
           * ]
           *  */  
          $orders = Order::selectRaw('YEAR(created_at) AS year, MONTH(created_at) AS month, COUNT(*) AS count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        return view('index', compact('mount_today', 'mount_month', 'mount_year', 'order_today', 'order_month', 'order_year', 'total_orders', 'processing_orders', 'completed_orders', 'pending_orders','verified_users', 'unverified_users', 'total_users', 'categories', 'products_on_category', 'customers', 'orders'));
    }
    public function show(Request $request){
        $customer = User::with('orders','orders.shipping_addr')->find($request->id);
        $orders_total = collect($customer->orders)->sum('total');
        return response()->json(['user'=> $customer, 'orders_total' => $orders_total]);
    }

     public function showOrder(Request $request){
      
    // return response()->json(['order'=> $order, "orders" => $orders, 'order_quantity'=>$order_quantity, 'user'=>$user]);
   }
}