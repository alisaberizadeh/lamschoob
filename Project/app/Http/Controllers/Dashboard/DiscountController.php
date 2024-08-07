<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{

    public function index()
    {
        $discountCode = DiscountCode::where('type','base')->orderBy("id", "DESC")->get();
        return view('dashboard.discounts.home', [
            'discountCode' => $discountCode
        ]);
    }
    public function new(Request $request)
    {
        $now = Carbon::now();

        $request->validate([
            'code' => 'required|unique:discount_codes',
            'discount' => 'required|integer',
            'expiration_date' => 'required|integer',
        ]);

        DiscountCode::create([
            'code' => $request->code , 
            'discount' => $request->discount , 
            'expiration_date' => $now->addDays($request->expiration_date) , 
        ]);

        return redirect()->back()->with('success','کد تخفیف ایجاد شد');
        
  
        // echo verta()->lt($ex);
    }
    public function delete($id)
    {

        $discount = DiscountCode::find($id);
        $discount->delete();
        return redirect()->back()->with('success','کد تخفیف حذف شد');
        
  
     }
}
