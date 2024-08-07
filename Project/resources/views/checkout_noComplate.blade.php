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
                    <i class="fal fa-receipt bg-danger text-white"></i>
                    <a href="#">
                        <h4>تکمیل سفارش</h4>
                    </a>
                </div>
            </div>
        </div>
        <div class="checkout">
            <div class="text-center">
                <div class="icon-success warning">
                    <i class="fal fa-exclamation-triangle"></i>
                </div>
                <div class="order-success">
                    <div class="h4 font-weight-bold mb-4">ثبت سفارش شما انجام نشد</div>
                    <p> کد خطا = {{$error}}</p>
                </div>
                <div class="order-actions">
                 
                    <a href="/contact" class="btn btn-danger btn-order-tracking btn-contact-backup"><i class="fa fa-phone"></i>
                        تماس با پشتیبانی
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
