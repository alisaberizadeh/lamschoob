@extends('dashboard.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">





            <div class="row">
                <div class="col">
                    <div class="card border-top border-0 border-4 border-info radius-10 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="col-5">
                                    <h5 class="mb-1 text-info">  مدیریت محصولات</h5>
                                </div>
                                
                                <form action="" method="GET" class="col-7">
                                    <div class="input-group mb-3 ">
                                        <input type="text" class="form-control" name="search" placeholder="جستوجو کنید ....">
                                        <div class="input-group-append">
                                          <button class="btn btn-primary" type="submit"><i class="bx bx-search"></i></button>
                                        </div>
                                      </div>
                                </form>
                                  
                            </div>

                            <div class="table-responsive mt-3">
                                <table class="table align-middle mb-  border border-1 border-gray">
                                    <thead class="table-light">
                                        <tr >
                                            <th class="  border-right border-1 border-gray"># </th>
                                            <th>شناسه محصول </th>
                                            <th>نام محصول</th>
                                            <th>قیمت</th>
                                            <th> تخفیف</th>
                                            <th>دسته بندی</th>
                                            <th>تاریخ</th>
                                            <th>عملیات </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($products as $item)
                                            <tr>
                                                <td class="  border-right border-1 border-gray">{{ $loop->iteration }}</td>
                                                <td class="fw-bold">{{$item->code}}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="recent-product-img">
                                                            <img src="{{ App\Models\Gallery::where('product_id', $item->id)->first()->src }}"
                                                                alt="">
                                                        </div>
                                                        <div class="ms-2">
                                                            <h6 class="mb-1 font-14 fw-bold">{{$item->title}} 
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                 <td  class="fw-bold"><span
                                                        class=" fw-bold text-warning ">{{number_format($item->final_price)}} تومان</span> <br>
                                                        @if ($item->discount != null)
                                                        <span class="off_price">{{number_format($item->price)}} تومان</span>
                                                    @endif
                                                        
                                                </td>
                                                <td>
                                                    @if ($item->discount != null)
                                                        <span class="badge bg-light-info text-info">   {{$item->discount}}%  </span>
                                                        @else
                                                        <span class="badge bg-light-dark text-dark">ندارد</span>
                                                    @endif
                                                </td>
                                                <td class="fw-bold">
                                                    {{App\Models\Category::where("id",$item->category_id)->first()->title}}
                                                </td>
                                                <td class="fw-bold">
                                                    {{$item->date}}
                                                </td>
                                                <td>
                                                    <div class="d-flex order-actions"> <a href="{{route('products.delete',$item->id)}}"
                                                            class="text-danger bg-light-danger border-0"><i
                                                                class='bx bxs-trash'></i></a>
                                                        <a href="{{route('products.edit',$item->id)}}"
                                                            class="ms-4 text-primary bg-light-primary border-0"><i
                                                                class='bx bxs-edit'></i></a>
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
            </div>






        </div>
    </div>
@endsection
