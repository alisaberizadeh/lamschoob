@extends('dashboard.layouts.master')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <div class="page-wrapper">
        <div class="page-content">




            <div class="row">
                <div class="col">
                    <div class="card radius-10 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="col-9">
                                    <h5 class="mb-1 ">  جزئیات سفارش {{ $order->code }}</h5>
                                </div>
                                @switch($order->status)
                                @case('delivered')
                                    <span class="badge bg-light-success text-success">تحویل داده شده</span>
                                @break

                                @case('pending')
                                    <a href="{{route('orders.completing.update',$order->id)}}" class="btn btn-sm btn-warning">تغییر به در حال آماده سازی <i class="bx bx-sync"></i></a>
                                @break

                                @case('completing')
                                <a href="{{route('orders.delivered.update',$order->id)}}" class="btn btn-sm btn-success">تغییر به تحویل شده <i class="bx bx-sync"></i></a>
                                @break
                            @endswitch
                            </div>

                                 
                                <table class="table mt-3 table-bordered table-striped text-center">

                                    <tr>
                                        <td><strong>فروشنده : </strong></td>
                                        <td>گروه صنعتی لمس چوب</td>
                                    </tr>
                                    <tr>
                                        <td><strong>خریدار : </strong></td>
                                        <td>{{ App\Models\User::where('id', $order->user_id)->first()->name }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>شماره تلفن : </strong></td>
                                        <td>{{ App\Models\User::where('id', $order->user_id)->first()->mobile }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>ایمیل : </strong></td>
                                        <td>{{ App\Models\User::where('id', $order->user_id)->first()->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>تاریخ سفارش : </strong></td>
                                        <td>{{ $order->date }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>شماره سفارش : </strong></td>
                                        <td>{{ $order->code }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>کد رهگیری آیدیپی   : </strong></td>
                                        <td>{{ $order->track_id }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>کلید منحصر بفرد تراکنش   : </strong></td>
                                        <td>{{ $order->transaction_id  }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong> محصولات : </strong></td>
                                        <td>
                                            @php
                                                $products = explode('-', $order->products_id);
                                                array_shift($products);
                                            @endphp
                                            @foreach ($products as $item)
                                                <span class="badge bg-primary text-white"><a
                                                        href="{{ route('products.single', App\Models\Product::where('id', $item)->first()->id) }}"
                                                        class="text-white">
                                                        {{ App\Models\Product::where('id', $item)->first()->title }} (کد :
                                                        {{ App\Models\Product::where('id', $item)->first()->code }})</a></span>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong> مبلغ کل سفارش : </strong></td>
                                        <td>
                                            <span class="badge bg-light text-primary">{{ number_format($order->price) }}
                                                تومان</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong> مبلغ پیش پرداخت (پرداخت شده) : </strong></td>
                                        <td>
                                            <span
                                                class="badge bg-light text-primary">{{ number_format($order->prepayment) }}
                                                تومان</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong> مبلغ باقی مانده : </strong></td>
                                        <td>
                                            <span
                                                class="badge bg-light text-primary">{{ number_format($order->remainPrice) }}
                                                تومان</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong> وضعیت سفارش : </strong></td>
                                        <td>
                                            @switch($order->status)
                                                @case('delivered')
                                                    تحویل داده شده
                                                @break

                                                @case('pending')
                                                    در حال بررسی
                                                @break

                                                @case('completing')
                                                    در حال آماده سازی
                                                @break
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong> استان : </strong></td>
                                        <td>
                                            {{ $order->state }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong> شهر : </strong></td>
                                        <td>
                                            {{ $order->city }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong> آدرس پستی: </strong></td>
                                        <td>
                                            {{ $order->address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong> کد پستی: </strong></td>
                                        <td>
                                            {{ $order->postalCode }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong> تلفن ثابت : </strong></td>
                                        <td>
                                            {{ $order->phone }}
                                        </td>
                                    </tr>
                                    @if ($order->notes != null)
                                        <tr>
                                            <td><strong> یادداشت سفارش شما : </strong></td>
                                            <td>
                                                {{ $order->notes }}
                                            </td>
                                        </tr>
                                    @endif

                                </table>

     
                        </div>
                    </div>
                </div>
            </div>
    



        </div>
    </div>
@endsection
