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
                                <div class="col-5">
                                    <h5 class="mb-1 ">   تحویل شده        </h5>
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
                                <table class="table align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#  </th>
                                            <th>کد سفارش</th>
                                            <th> خریدار</th>
                                            <th>شماره تلفن</th>
                                            <th>تاریخ</th>
                                            <th>وضعیت</th>
                                            <th>قیمت</th>
                                            <th>مشاهده </th>
                                            <th>حذف </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td class="  border-right border-1 border-gray">{{ $loop->iteration }}</td>
                                            <td class="fw-bold">{{$order->code}}</td>
                                            <td class="fw-bold">{{ App\Models\User::where('id', $order->user_id)->first()->name }}</td>
                                            <td class="fw-bold">{{ App\Models\User::where('id', $order->user_id)->first()->mobile }}</td>
                                            <td class="fw-bold">{{ $order->date }}</td>
                                            <td class="fw-bold"> 
                                                @switch($order->status)
                                                @case('delivered')
                                                   <span class="badge bg-light-success text-success"> تحویل داده شده</span>
                                                @break

                                                @case('pending')
                                                   <span class="badge bg-light-primary text-primary"> در حال بررسی</span>
                                                @break

                                                @case('completing')
                                                   <span class="badge bg-light-warning text-warning"> در حال آماده سازی</span>
                                                @break
                                            @endswitch
                                            </td>
                                            <td class="fw-bold">{{ number_format($order->price)}} تومان</td>
                                            <td>
                                                <div class="d-flex order-actions">
                                                     <a href="{{route('orders.single',$order->id)}}" class="text-success bg-light-success border-0 ml-2"><i class='bx bxs-show'></i></a>
                                         
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex order-actions">
                                                     <a href="{{route('orders.delete',$order->id)}}" class="text-danger bg-light-danger border-0 mr-2"><i class='bx bxs-trash'></i></a>
                                         
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
