@extends('user.layouts.master')


@section('content')
    <div class="widget">
        <div class="widget-title">
            آخرین سفارشات
        </div>
        <div class="widget-content d-block">
            <div id="accordion">

                @foreach ($orders as $order)
                    <div class="card">
                        <div class="card-header bg-danger d-flex justify-content-between">
                            <a class="collapsed card-link text-white " data-toggle="collapse"
                                href="#collapse_{{ $order->id }}">
                                <strong>{{ $order->date }}</strong>
                            </a>

                            <a class="collapsed card-link text-white " data-toggle="collapse"
                                href="#collapse_{{ $order->id }}">
                                <strong> {{ number_format($order->price) }} تومان</strong>
                            </a>
                        </div>
                        <div id="collapse_{{ $order->id }}" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <button class="btn btn-sm btn-success mb-3" onclick="window.print();">چاپ سفارش</button>

                                <table class="table table-sm table-bordered table-striped text-center">

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
                @endforeach

            </div>
        </div>
    </div>
@endsection
