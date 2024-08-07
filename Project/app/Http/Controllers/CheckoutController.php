<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    public function index()
    {
        if (session('checkout.price') != null) {
            return view('checkout');
        } else {
            return redirect('/');
        }
    }
    public function payment(Request $request)
    {
        if (session('checkout.price') != null) {
            do {
            $code = rand(111111, 999999);
        } while (Order::where("code", $code) != true);

        session()->put('order', [
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'postalCode' => $request->postalCode,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'code' => $code,
        ]);



        $params = [
            'order_id' => $code,
            'amount' => (int) session('checkout.prepayment') . '0',
            'name' => Auth::user()->name,
            'phone' => Auth::user()->mobile,
            'mail' => Auth::user()->email,
            'callback' => route("checkout.callback"),
        ];
        $response = Http::withHeaders([
            'X-API-KEY' => '2d156313-dd63-41e3-a59e-572cda8299db',
            'X-SANDBOX' => 1,
            'Accept' => 'application/json',
        ])->post('https://api.idpay.ir/v1.1/payment', $params);

        session()->put('orderState', true);

        if ($response->getStatusCode() == 201) {
            $items = $response->json();
            $link = $items['link'];
            session()->put('sendingpay', true);
            return redirect($link);
        } else {
            return redirect(route('checkout.noComplate', $response->getStatusCode()));
        }
       }
       else {
        return redirect('/');
    }
    }

    public function callback()
    {
        if (session('sendingpay') != null) {
            
        $v = verta();
        session()->put('orderState', true);
        $status = request()->query('status');
        $track_id = request()->query('track_id');
        $transaction_id = request()->query('id');
        $code = request()->query('order_id');

        if ($status == 10) {

            // Verify Payment
            $params = ['id' => $transaction_id, 'order_id' => $code];
            $response = Http::withHeaders([
                'X-API-KEY' => '2d156313-dd63-41e3-a59e-572cda8299db',
                'X-SANDBOX' => 1,
                'Accept' => 'application/json',
            ])->post('https://api.idpay.ir/v1.1/payment/verify', $params);

            if ($response->getStatusCode() == 200) {
                $items = $response->json();
                $order = Order::create([
                    'date' => $v->format('d %B Y'),
                    'code' => $code,
                    'user_id' => Auth::id(),
                    'state' => session('order.state'),
                    'city' => session('order.city'),
                    'address' => session('order.address'),
                    'postalCode' => session('order.postalCode'),
                    'phone' => session('order.phone'),
                    'notes' => session('order.notes'),
                    'price' => session('checkout.price'),
                    'prepayment' => session('checkout.prepayment'),
                    'remainPrice' => session('checkout.price') - session('checkout.prepayment'),
                    'status' => 'pending',
                    'track_id' => $track_id,
                    'transaction_id' => $transaction_id,
                ]);
                if ($order) {

                    foreach (session('products') as $value) {
                        $val = $order->products_id . "-" . $value;
                        $order->update([
                            'products_id' => $val
                        ]);
                    }

                    $carts = Cart::where('user_id', Auth::id())->get();
                    foreach ($carts as $value) {
                        $value->delete();
                    }
                    if (session('checkout.mydiscount') != null) {
                        $mydiscount = session('checkout.mydiscount');
                        $mydiscount->delete();
                    }
                    session()->forget('checkout');
                    session()->forget('order');
                    session()->forget('products');
                    session()->forget('sendingpay');

                    return redirect(route('checkout.complate', $order->id));
                }

            } else {
                return redirect(route('checkout.noComplate', $response->getStatusCode()));
            }
        } else {
            return redirect(route('checkout.noComplate', $status));
        }
        }
        else {
            return redirect('/');
        }
    }

    public function complate($id)
    {
        if (session('orderState')) {
            $order = Order::where('id', $id)->first();
            session()->forget('orderState');
            return view('checkout_complate', [
                'order' => $order,
            ]);
        } else {
            return redirect('/');
        }
    }
    public function no_complate($error)
    {
        if (session('orderState')) {
            session()->forget('orderState');
            return view('checkout_noComplate', [
                'error' => $error,
            ]);
        } else {
            return redirect('/cart');
        }
    }
}
