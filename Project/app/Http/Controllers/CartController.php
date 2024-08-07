<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            return redirect(route('login'))->with("info", "ابتدا باید وارد حساب کاربری شوید");
        }

        $carts = Cart::where('user_id', Auth::id())->orderBy("id", "DESC")->get();
        $sum = 0;
        $products = [];
        foreach ($carts as $value) {
            $sum += \App\Models\Product::where("id", $value->product_id)->first()->final_price;
            array_push($products , $value->product_id);
        }
        session()->put('products', $products);
        if (!session()->has('checkout.discount')) {

            session()->put('checkout', [
                'price' => $sum,
                'prepayment' => $sum * (30 / 100),
                // 'wage' => $sum * (9/100) ,
            ]);
        }
 

        return view('cart', [
            'carts' => $carts
        ]);
    }


    public function add($id)
    {
        session()->forget('checkout');

        $v = verta();
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $id,
            'date' => $v->format('d %B Y'),
        ]);

        return redirect()->back();
    }

    public function remove($id)
    {
        $cart = Cart::where("product_id", $id)->where("user_id", Auth::id())->first();
        $cart->delete();
        session()->forget('checkout');

        return redirect('/cart');
    }

    public function discount(Request $request)
    {
        if (!session()->has('checkout.discount')) {
            $code = DiscountCode::where("code", $request->code)->first();
            if ($code) {
                if ($code->user_id != null) {
                    if ($code->user_id == Auth::id()) {
                        $price =  session('checkout.price') - (session('checkout.price') * ($code->discount / 100));
                        $prepayment = $price * (30 / 100);
                        session()->put('checkout', [
                            'discount' => session('checkout.price') * ($code->discount / 100),
                            'mydiscount' => $code,
                            'price' => $price,
                            'prepayment' => $prepayment,
                        ]);
                        return redirect()->back()->with('success', 'تخفیف اعمال شد');
                    } else {
                        return redirect()->back()->with('info', 'کد تخفیف معتبر نمی باشد ');
                    }
                }
                else {
                    $expiration_date = verta($code->expiration_date);
                    if (verta()->lt($expiration_date) == 1) {
                        $price =  session('checkout.price') - (session('checkout.price') * ($code->discount / 100));
                        $prepayment = $price * (30 / 100);
                        session()->put('checkout', [
                            'discount' => session('checkout.price') * ($code->discount / 100),
                            'price' => $price,
                            'prepayment' => $prepayment,
                        ]);
                        return redirect()->back()->with('success', 'تخفیف اعمال شد');
                    } else {
                        return redirect()->back()->with('info', 'کد تخفیف معتبر نمی باشد ');
                    }
                }
            } else {
                return redirect()->back()->with('info', 'کد تخفیف معتبر نمی باشد ');
            }
        } else {
            return response()->json([
                'status' => 'قبلا از کد تخفیف استفاده کرده اید',
            ]);
        }
    }
}
