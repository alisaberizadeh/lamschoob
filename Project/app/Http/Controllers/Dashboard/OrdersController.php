<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function pending_show()
    {
        if (request()->query('search') != null) {
            $search = request()->query('search');
            $orders = Order::where("status","pending")->orWhere("code", "like", "%$search%")->orWhere("date", "like", "%$search%")->orWhere("track_id", "like", "%$search%")->orWhere("state", "like", "%$search%")->orWhere("phone", "like", "%$search%")->orderBy("id", "DESC")->get();
        }
        else {
            $orders = Order::where("status","pending")->orderBy("id","DESC")->get();
        }
        return view('dashboard.orders.pending',[
            'orders' => $orders
        ]);
    }

    public function completing_show()
    {
        if (request()->query('search') != null) {
            $search = request()->query('search');
            $orders = Order::where("status","completing")->orWhere("code", "like", "%$search%")->orWhere("date", "like", "%$search%")->orWhere("track_id", "like", "%$search%")->orWhere("state", "like", "%$search%")->orWhere("phone", "like", "%$search%")->orderBy("id", "DESC")->get();
        }
        else {
            $orders = Order::where("status","completing")->orderBy("id","DESC")->get();
        }
        return view('dashboard.orders.completing',[
            'orders' => $orders
        ]);
    }

    public function delivered_show()
    {
        if (request()->query('search') != null) {
            $search = request()->query('search');
            $orders = Order::where("status","delivered")->orWhere("code", "like", "%$search%")->orWhere("date", "like", "%$search%")->orWhere("track_id", "like", "%$search%")->orWhere("state", "like", "%$search%")->orWhere("phone", "like", "%$search%")->orderBy("id", "DESC")->get();
        }
        else {
            $orders = Order::where("status","delivered")->orderBy("id","DESC")->get();
        }
        return view('dashboard.orders.delivered',[
            'orders' => $orders
        ]);
    }





    public function delete($id)
    {
        $order = Order::where("id",$id)->first();
        $order->delete();
        return redirect()->back()->with('success','سفارش حذف شد');

    }

    public function single($id)
    {
        $order = Order::where("id",$id)->first();
        return view('dashboard.orders.single',[
            'order' => $order
        ]);
    }
    public function completing_update($id)
    {
        $order = Order::where("id",$id)->first();
        $order->update([
            'status' => 'completing' 
        ]);
        return redirect(route('orders.completing'));
    }
    public function delivered_update($id)
    {
        $order = Order::where("id",$id)->first();
        $order->update([
            'status' => 'delivered' 
        ]);
        return redirect(route('orders.delivered'));
    }
}
