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
                        <i class="fal fa-file-invoice"></i>
                        <a href="#">
                            <h4>جزئیات پرداخت</h4>
                        </a>
                    </div>
                    <div class="title-thankyou">
                        <i class="fal fa-receipt"></i>
                        <a href="#">
                            <h4>تکمیل سفارش</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-9 col-xs-12">

                    @if (count($carts) > 0)
                        <div class="mb-3">
                            @foreach ($carts as $item)
                                <div class="col-12 cart_items_box  ">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="{{ App\Models\Gallery::where('product_id', $item->product_id)->first()->src }}"
                                                alt="{{ App\Models\Product::where('id', $item->product_id)->first()->title }}">
                                            <a href=""
                                                class=" text-dark mr-3">{{ App\Models\Product::where('id', $item->product_id)->first()->title }}</a>
                                        </div>
                                        <div>
                                            <a href=""
                                                class="price text-primary mr-5">{{ number_format(App\Models\Product::where('id', $item->product_id)->first()->final_price) }}
                                                تومان
                                            </a>
                                        </div>
                                    </div>


                                    <form action="{{ route('cart.remove', $item->product_id) }}" method="POST"> @csrf
                                        <button class="cart_remove"><i class="fal fa-times"></i></button>
                                    </form>

                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="checkout">
                            <div class="form-coupon-toggle">
                                <div class="woocommerce-info">
                                    سبد خرید شما خالی است
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (count($carts) > 0)
                        <form action="{{ route('cart.discount') }}" method="POST" class="woocommerce-cart-form"> @csrf

                            <div class="coupon">
                                @if (!session('checkout.discount'))
                                    <label for="coupon-code"> کد تخفیف دارید ؟</label>
                                    <input type="text" name="code" class="coupon-code code" placeholder="كد تخفیف"
                                        required>
                                    <button type="submit" class="apply-coupon">اعمال تخفیف</button>
                                @else
                                    <span class="text-success fw-bold">شما از کد تخفیف استفاده کرده اید</span>
                                @endif

                            </div>
                        </form>
                    @endif
                </div>






                @if (count($carts) > 0)
                    <div class="col-lg-3 col-md-3 col-xs-12">
                        <div class="cart-collaterals">
                            <div class="col-colla">
                                <div class="cart-totals">
                                    <h2>مجموع کل سبد خرید</h2>

                                    <table class="shop-table table mb-3">
                                        <tbody>

                                            @if (session('checkout.discount'))
                                                <tr class="cart-discount">
                                                    <th class="text-success">تخفیف شما </th>
                                                    <td>
                                                        <span class="price bg-success">
                                                            {{ number_format(session('checkout.discount')) }}
                                                            <span class="amount">تومان</span>
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endif

                                            <tr class="cart-subtotal">
                                                <th> قیمت کل </th>
                                                <td>
                                                    <span class="price">
                                                        {{ number_format(session('checkout.price')) }}

                                                        <span class="amount">تومان</span>
                                                    </span>
                                                </td>
                                            </tr>


                                            <tr class="cart-subtotal">
                                                <th> مبلغ پراختی (پیش پرداخت) </th>
                                                <td>
                                                    <span class="prepayment">
                                                        {{ number_format(session('checkout.prepayment')) }}

                                                        <span class="amount">تومان</span>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="info_prepayment"> <i class="fa fa-info"></i>
                                        مشتری گرامی ، با توجه به قوانین فروشگاه شما به عنوان <strong>پیش پرداخت</strong>
                                        باید 30% از قیمت کل را پرداخت کنید</p>

                                    <div class="proceed-to-checkout">
                                        <a href="/checkout" class="checkout">تکمیل سفارش </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
