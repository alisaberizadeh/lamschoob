<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\DiscountCode;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
     public function index()
     {
          return view('user.home');
     }
     public function orders()
     {
          $orders = Order::where("user_id",Auth::id())->orderBy("id","DESC")->get();
          return view('user.orders' , [
               'orders' => $orders
          ]);
     }
     public function profile(Request $request)
     {
          $id = Auth::id();
          $request->validate([
               'name' => ['required', 'string', 'max:255'],
               'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,$id"],
               'mobile' => ['required', 'string', 'regex:/^09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}$/', 'min:11', 'max:11', "unique:users,mobile,$id"],
          ]);

          $user = User::find(Auth::id());
          $user->update([
               'name' => $request->name,
               'email' => $request->email,
               'mobile' => $request->mobile,
          ]);
          return redirect()->back()->with('success', 'اطلاعات حساب بروزرسانی شد');
     }
     public function password(Request $request)
     {
          $request->validate([
               'password' => ['required', 'string', 'min:8', 'confirmed'],

          ]);

          $user = User::find(Auth::id());
          $user->update([
               'password' => Hash::make($request->password),
          ]);
          return redirect()->back()->with('success', 'کلمه عبور تغییر کرد');
     }


     public function discounts()
     {
          $discounts = DiscountCode::where("user_id", Auth::id())->get();
          return view('user.discounts', [
               'discounts' => $discounts,
          ]);
     }
}
