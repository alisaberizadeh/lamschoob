<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Mail\DiscountBirth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function index()
    {
        if (request()->query('search') != null) {
            $search = request()->query('search');
            $users = User::where("name", "like", "%$search%")->orWhere("email", "like", "%$search%")->orWhere("birth", "like", "%$search%")->orWhere("mobile", "like", "%$search%")->orderBy("id", "DESC")->get();
        }
        else {

            $users = User::orderBy("id", "DESC")->get();
        }
        return view('dashboard.users.home', [
            'users' => $users
        ]);
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with("success","کاربر حذف شد");

    }
    public function discount($id)
    {
        $discounts = DiscountCode::where('user_id',$id)->get();
        $user = User::where('id',$id)->first();
        return view('dashboard.users.discount', [
            'discounts' => $discounts , 
            'user' => $user , 
        ]);
    }
    public function new_discount(Request $request ,  $id)
    {
        $user = User::where('id',$id)->first();
        $v = verta();
        $now = Carbon::now();
        $request->validate([
            'code' => 'required|unique:discount_codes',
            'discount' => 'required|integer',
        ]);

        DiscountCode::create([
            'code' => $request->code , 
            'discount' => $request->discount , 
            'expiration_date' => $now, 
            'user_id' => $id, 
            'type' => 'user-only'
        ]);

        // Mail::to($user->email)->queue(new DiscountBirth("$user->name" , $request->discount , $v->format('d %B Y')));


        return redirect()->back()->with('success','کد تخفیف ایجاد شد');
        
  
    }
}
