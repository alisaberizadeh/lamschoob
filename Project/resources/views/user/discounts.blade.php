@extends('user.layouts.master')


 @section('content')
 <div class="notification-list">
    
    @foreach ($discounts as $item)
        <div class="item">
        <div class="item-area">
            <div class="product-image-area d-flex align-items-center justify-content-center ml-3">
                     <h1  class=" text-warning">%</h1>
             </div>
            <div class="product-detail-area">
                <h3 class="product-name">  درصد تخفیف : <strong class="  text-success">{{$item->discount}}%</strong>   </h3>
                <h3 class="product-name">  کد تخفیف   : <strong class="  text-success">{{$item->code}} </strong>   </h3>
                <h3 class="product-name">    انقضا     : <strong class="  text-success"> تاریخ انقضا ندارد</strong>   </h3>
                
                <ul>
                    <li class="email-alert">معتبر</li>
                    <li class="edit-alert">
                        <a href="/cart">استفاده میکنم</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> 
    @endforeach
   
</div>
 @endsection