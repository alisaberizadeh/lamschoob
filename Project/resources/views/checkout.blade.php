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
                        <i class="fal fa-receipt"></i>
                        <a href="#">
                            <h4>تکمیل سفارش</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="checkout">


                <form action="{{route('checkout.payment')}}" method="POST" class="checkout-form woocommerce-checkout"> @csrf
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="customer-details">
                                <div class="woocommerce-billing-fields">
                                    <h3>جزئیات سفارش</h3>
                                    <div class="woocommerce-billing-fields-field-wrapper">

                                        <div class="form-row form-row-first validate-required">
                                            <label for="billing-state" class="">استان
                                                <abbr class="required" title="ضروری">*</abbr>
                                            </label>
                                            <span class="woocommerce-input-wrapper">
                                                <div class="custom-select-ui">
                                                    <select class="category" name="state">
                                                        <option value="تهران">تهران</option>
                                                        <option value="آذربایجان شرقی	">آذربایجان شرقی </option>
                                                        <option value="آذربایجان غربی	">آذربایجان غربی </option>
                                                        <option value="اردبیل">اردبیل</option>
                                                        <option value="اصفهان">اصفهان</option>
                                                        <option value="البرز">البرز</option>
                                                        <option value="ایلام">ایلام</option>
                                                        <option value="بوشهر">بوشهر</option>
                                                        <option value="چهارمحال و بختیاری	">چهارمحال و بختیاری </option>
                                                        <option value="خراسان جنوبی	">خراسان جنوبی </option>
                                                        <option value="خراسان رضوی	">خراسان رضوی </option>
                                                        <option value="خراسان شمالی	">خراسان شمالی </option>
                                                        <option value="خوزستان">خوزستان</option>
                                                        <option value="زنجان	">زنجان </option>
                                                        <option value="سمنان">سمنان</option>
                                                        <option value="سیستان و بلوچستان	">سیستان و بلوچستان </option>
                                                        <option value="شیراز">شیراز</option>
                                                        <option value="قزوین">قزوین</option>
                                                        <option value="قزوین">قزوین</option>
                                                        <option value="کردستان">کردستان</option>
                                                        <option value="کرمان">کرمان</option>
                                                        <option value="کرمانشاه">کرمانشاه</option>
                                                        <option value="کهگیلویه وبویراحمد	">کهگیلویه وبویراحمد </option>
                                                        <option value="گلستان">گلستان</option>
                                                        <option value="گیلان">گیلان</option>
                                                        <option value="لرستان">لرستان</option>
                                                        <option value="مازندران	">مازندران </option>
                                                        <option value="مرکزی">مرکزی</option>
                                                        <option value="هرمزگان">هرمزگان</option>
                                                        <option value="همدان">همدان</option>
                                                        <option value="یزد	">یزد </option>
                                                    </select>
                                                </div>
                                            </span>
                                        </div>
                                        <!-- item -->
                                        <div class="form-row form-row-first validate-required">
                                            <label for="billing-address" class="">شهر
                                                <abbr class="required" title="ضروری">*</abbr>
                                            </label>
                                            <span class="woocommerce-input-wrapper">
                                                <input type="text" class="input-billing-address" name="city"
                                                    id="billing-address" required>
                                            </span>
                                        </div>
                                        <!-- item -->
                                        <div class="form-row form-row-first validate-required">
                                            <label for="billing-address" class="">آدرس پستی
                                                <abbr class="required" title="ضروری">*</abbr>
                                            </label>
                                            <span class="woocommerce-input-wrapper">
                                                <input type="text" class="input-billing-address" name="address"
                                                    id="billing-address" required>
                                            </span>
                                        </div>

                                        <!-- item -->
                                        <div class="form-row form-row-first validate-required">
                                            <label for="billing-postcode" class="">کد پستی
                                                <abbr class="required" title="ضروری">*</abbr>
                                            </label>
                                            <span class="woocommerce-input-wrapper">
                                                <input type="text" class="input-billing-postcode" maxlength="10" name="postalCode"
                                                    id="billing-postcode" required>
                                            </span>
                                        </div>
                                        <!-- item -->
                                        <div class="form-row form-row-first validate-required">
                                            <label for="billing-phone" class="">تلفن ثابت
                                                <abbr class="required" title="ضروری">*</abbr>
                                            </label>
                                            <span class="woocommerce-input-wrapper">
                                                <input type="text" class="input-billing-phone" maxlength="11" name="phone"
                                                    id="billing-phone" required>
                                            </span>
                                        </div>
                                        <!-- item -->

                                    </div>
                                </div>

                                <div class="woocommerce-additional-fields">
                                    <div class="additional-fields-field-wrapper">
                                        <div class="form-row form-row-first validate-required">
                                            <label for="billing-company" class="">یادداشت سفارش
                                                <span class="optional">(اختیاری)</span>
                                            </label>
                                            <span class="woocommerce-input-wrapper">
                                                <textarea name="notes" class="input-text " id="order-comments"
                                                    placeholder="یادداشت ها درباره سفارش شما ، برای مثال نکات مهم برای تحویل بار " >                                                </textarea>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            <h3 id="order-review-heading">سفارش شما</h3>
                            <div class="woocommerce-checkout-review-order">
                                <table class="table woocommerce-checkout-review-order-table">

                                    <tfoot>

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
                                    </tfoot>
                                </table>
                                <div class="woocommerce-checkout-payment">
                                     
                                    <div class="form-row place-order">
                                        <button type="submit"
                                            class="btn woocommerce-checkout-place-order">پرداخت</button>
                                    </div>
                                </div>
                            </div>
                            <span class="lead-time checkout-time">
                                <i class="fal fa-truck"></i>
                                زمان تقریبی تحویل
                                حدود 20 روز
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
