<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $orders = Order::where("status","pending")->take(5)->orderBy("id","DESC")->get();

        return view('dashboard.home',[
            'orders' => $orders
        ]);
    }
}
