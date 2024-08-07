@extends('dashboard.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">


            <div class="row">

                <div class="col-lg-6">
                    <div class="card radius-10 mb-3 border-top border-0 border-4 border-info radius-10 ">
                        <div class="card-body">
                            <div class="d-flex align-items-center">

                                <div><i class="bx bx-table me-1 font-22 text-info"></i>
                                </div>
                                <h5 class="mb-0 text-info"> بخش پیشنهادات </h5>
                            </div>

                            <div class="table-responsive mt-3">
                                <table class="table align-middle mb-  border border-1 border-gray">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="  border-right border-1 border-gray"># </th>
                                            <th>نام محصول</th>
                                            <th>قیمت</th>
                                            <th>عملیات </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($products_offers as $item)
                                            <tr>
                                                <td class="  border-right border-1 border-gray">{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="recent-product-img">
                                                            <img src="{{ App\Models\Gallery::where('product_id', $item->product_id)->first()->src }}"
                                                                alt="">
                                                        </div>
                                                        <div class="ms-2">
                                                            <h6 class="mb-1 font-14 fw-bold">{{ App\Models\Product::where('id', $item->product_id)->first()->title }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fw-bold"><span
                                                        class=" fw-bold text-warning ">{{ number_format(App\Models\Product::where('id', $item->product_id)->first()->final_price) }}
                                                        تومان</span> <br>
                                                    @if (App\Models\Product::where('id', $item->product_id)->first()->discount != null)
                                                        <span class="off_price">{{ number_format(App\Models\Product::where('id', $item->product_id)->first()->price) }}
                                                            تومان</span>
                                                    @endif

                                                </td>

                                                <td>
                                                    <div class="d-flex order-actions"> 
                                                        <a href="{{ route('setting.offers.delete', $item->id) }}"
                                                            class="text-danger bg-light-danger border-0"><i
                                                                class='bx bxs-trash'></i></a>
                                                      
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card  border-top border-0 border-4 border-info radius-10 mb-0">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bx-plus me-1 font-22 text-info"></i>
                                </div>
                                <h5 class="mb-0 text-info"> اضافه کردن  </h5>
                            </div>
                            <hr>


                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="m-0">
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger fw-bold ">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="row g-3 d-flex justify-content-between" action="{{ route('setting.offers.add') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                @php
                                    $arr = [];
                                    foreach ($products_offers as $value) {
                                        array_push($arr , $value->product_id);
                                    }
                                @endphp

                                @foreach (App\Models\Product::whereNotIn('id',$arr)->orderBy("id", "DESC")->get() as $item)

                                <div class="col-md-5 bg-light d-flex align-items-center">
                                    <input type="checkbox" name="products[]" value="{{$item->id}}" class="mx-2"  id="ch_{{$item->id}}">
                                    <img src="{{ App\Models\Gallery::where('product_id', $item->id)->first()->src }}" width="40"alt="">
                                    <label for="ch_{{$item->id}}" class="mx-2">{{$item->title}}</label> 
                                </div>
                                
                                @endforeach



                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-info px-5">افزودن </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>






        </div>
    </div>
@endsection
