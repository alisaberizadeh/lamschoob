@extends('user.layouts.master')


 @section('content')
 <div class="widget">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="m-0">
            @foreach ($errors->all() as $error)
                <li class="text-danger fw-bold ">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 <div class="checkout">
    <form action="{{route('user.profile')}}" method="POST" class="checkout-form woocommerce-checkout"> @csrf
        <div class="customer-details">
            <div class="woocommerce-billing-fields">
                <h3>حساب من   </h3>
                <div class="woocommerce-billing-fields-field-wrapper">
                    <!-- item -->
                    <div class="form-row form-row-first validate-required">
                        <label for="billing-first-name" class="first-name">نام
                            <abbr class="required" title="ضروری">*</abbr>
                        </label>
                        <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-first-name"  name="name" value="{{Auth::user()->name}}" required>
                        </span>
                    </div>
                  
                    <!-- item -->
                   
                    <div class="form-row form-row-first validate-required">
                        <label for="billing-first-name" class="first-name">شماره تلفن
                            <abbr class="required" title="ضروری">*</abbr>
                        </label>
                        <span class="woocommerce-input-wrapper">
                            <input type="text" maxlength="11" class="input-first-name"  name="mobile" value="{{Auth::user()->mobile}}" required>
                        </span>
                    </div>
                  
                    <!-- item -->
                   
                    <div class="form-row form-row-first validate-required">
                        <label for="billing-email" class="">آدرس ایمیل
                            <abbr class="required" title="ضروری">*</abbr>
                        </label>
                        <span class="woocommerce-input-wrapper">
                            <input type="email" class="input-billing-email"  name="email" value="{{Auth::user()->email}}" required>
                        </span>
                    </div>
                    <!-- item -->
                    
                    <!-- item -->
                  
                    <button type="submit" class="mt-3 btn btn-secondary save-account" name="save-account-details">ذخیره تغییرات</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
 <div class="widget">
    <div class="checkout">
    <form action="{{route('user.password')}}" method="POST" class="checkout-form woocommerce-checkout"> @csrf
        <div class="customer-details">
            <div class="woocommerce-billing-fields">
                <h3> تغییر کلمه عبور</h3>
                <div class="woocommerce-billing-fields-field-wrapper">
                    <div class="form-row form-row-first validate-required">
                        <label for="billing-password" class="">کلمه عبور جدید     
                        </label>
                        <span class="woocommerce-input-wrapper">
                            <input type="password" class="input-billing-password" name="password" >
                        </span>
                    </div>
                    <div class="form-row form-row-first validate-required">
                        <label for="billing-password" class="">تکرار  کلمه عبور       
                        </label>
                        <span class="woocommerce-input-wrapper">
                            <input type="password" class="input-billing-password" name="password_confirmation" >
                        </span>
                    </div>
                    
                  
                    <button type="submit" class="mt-3 btn btn-secondary save-account" name="save-account-details">ذخیره تغییرات</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
 @endsection