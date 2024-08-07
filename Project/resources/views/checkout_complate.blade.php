@extends('layouts.app')

@section('content')
<main class="content">
    <div class="container">
        <div class="order-steps">
            <div class="checkout-breadcrumb">
                <div class="title-cart">
                    <i class="fal fa-bags-shopping bg-primary text-white"></i>
                    <a href="#">
                        <h4>سبد خرید</h4>
                    </a>
                </div>
                <div class="title-checkout">
                    <i class="fal fa-file-invoice bg-primary text-white"></i>
                    <a href="#">
                        <h4>جزئیات پرداخت</h4>
                    </a>
                </div>
                <div class="title-thankyou">
                    <i class="fal fa-receipt bg-primary text-white"></i>
                    <a href="#">
                        <h4>تکمیل سفارش</h4>
                    </a>
                </div>
            </div>
        </div>
        <div class="checkout">
            
                <div class="text-center">
                    <div class="icon-success">
                        <i class="fal fa-check text-success"></i>
                    </div>
                    <div class="order-success">
                        <div class="h4 font-weight-bold mb-4">ثبت سفارش شما با موفقیت انجام شد</div>
                     </div>
                    <div class="alert alert-success">
                        لطفا این برگه سفارش را برای خودتان ذخیره کنید . 
                    </div>
                    <button class="btn btn-sm btn-success" onclick="window.print();">چاپ سفارش</button>

                </div>
                <div class="order-table my-4">
                    <table class="table table-sm table-bordered table-striped text-center">

                        <tr>
                            <td><strong>فروشنده : </strong></td>
                            <td>گروه صنعتی لمس چوب</td>
                        </tr>
                        <tr>
                            <td><strong>خریدار : </strong></td>
                            <td>{{App\Models\User::where("id",$order->user_id)->first()->name}}</td>
                        </tr>
                        
                        <tr>
                            <td><strong>شماره تلفن : </strong></td>
                            <td>{{App\Models\User::where("id",$order->user_id)->first()->mobile}}</td>
                        </tr>
                        
                        <tr>
                            <td><strong>ایمیل   : </strong></td>
                            <td>{{App\Models\User::where("id",$order->user_id)->first()->email}}</td>
                        </tr>
                        <tr>
                            <td><strong>تاریخ سفارش   : </strong></td>
                            <td>{{$order->date}}</td>
                        </tr>
                        <tr>
                            <td><strong>شماره سفارش     : </strong></td>
                            <td>{{$order->code}}</td>
                        </tr>
                        <tr>
                            <td><strong> محصولات : </strong></td>
                            <td> 
                                @php
                                  $products = explode("-", $order->products_id);
                                  array_shift($products);
                                @endphp
                                 @foreach ($products as $item)
                                     
                                     <span class="badge bg-primary text-white"><a href="{{ route('products.single', App\Models\Product::where("id",$item)->first()->id) }}" class="text-white">  {{App\Models\Product::where("id",$item)->first()->title}} (کد :  {{App\Models\Product::where("id",$item)->first()->code}})</a></span>
                                     @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td><strong> مبلغ کل سفارش : </strong></td>
                            <td > 
                                <span class="badge bg-light text-primary">{{number_format($order->price)}} تومان</span> 
                            </td>
                        </tr>
                        <tr>
                            <td><strong> مبلغ پیش پرداخت (پرداخت شده) : </strong></td>
                            <td > 
                                <span class="badge bg-light text-primary">{{number_format($order->prepayment)}} تومان</span> 
                            </td>
                        </tr>
                        <tr>
                            <td><strong> مبلغ باقی مانده   : </strong></td>
                            <td > 
                                <span class="badge bg-light text-primary">{{number_format($order->remainPrice)}} تومان</span> 
                            </td>
                        </tr>
                        <tr>
                            <td><strong> وضعیت سفارش : </strong></td>
                            <td> 
                                @switch($order->status)
                                @case("delivered")
                                    تحویل داده شده
                                    @break
                                @case("pending")
                                    در حال بررسی
                                    @break
                                @case("completing")
                                     در  حال آماده سازی
                                    @break
                                    
                            @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td><strong> استان : </strong></td>
                            <td> 
                                 {{$order->state}}
                            </td>
                        </tr>
                        <tr>
                            <td><strong> شهر : </strong></td>
                            <td> 
                                 {{$order->city}}
                            </td>
                        </tr>
                        <tr>
                            <td><strong> آدرس پستی: </strong></td>
                            <td> 
                                {{$order->address}}
                            </td>
                        </tr>
                        <tr>
                            <td><strong> کد پستی: </strong></td>
                            <td> 
                                {{$order->postalCode}}
                            </td>
                        </tr>
                        <tr>
                            <td><strong> تلفن ثابت  : </strong></td>
                            <td> 
                                {{$order->phone}}
                            </td>
                        </tr>
                        @if ($order->notes != null)
                           <tr>
                            <td><strong> یادداشت سفارش شما    : </strong></td>
                            <td> 
                            {{$order->notes}}
                            </td>
                        </tr>  
                        @endif
                       
                    </table>

                    <button class="btn btn-sm btn-success" onclick="window.print();">چاپ سفارش</button>

                </div>
                {{-- <div class="order-actions">
                    <button type="submit" class="btn btn-primary btn-order-tracking">
                        <i class="fal fa-shopping-bag"></i>
                        پیگیری سفارش
                    </button>
                </div> --}}
             
        </div>
    </div>
</main>
@endsection
