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

                                <form action="{{route('users')}}" method="GET" class="col-7">
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
                                            <th>نام</th>
                                            <th>شماره تلفن</th>
                                            <th>ایمیل </th>
                                            <th>تاریخ تولد </th>
                                            <th>تاریخ عضویت </th>
                                            <th>سطح کاربری </th>
                                            <th>کد تخفیف </th>
                                            <th>عملیات </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $item)
                                            <tr>
                                                <td class="  border-right border-1 border-gray">{{ $loop->iteration }}</td>
                                                 <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="recent-product-img">
                                                            <img src="/uploads/avatars/1.png"
                                                                alt="{{$item->name}} ">
                                                        </div>
                                                        <div class="ms-2">
                                                            <h6 class="mb-1 font-14 fw-bold">{{$item->name}} 
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                 
                                                <td class="fw-bold">
                                                    {{$item->mobile}}
                                                </td>
                                                <td class="fw-bold">
                                                    {{$item->email}}
                                                </td>
                                                <td class="fw-bold">
                                                    {{$item->birth}}
                                                </td>
                                                <td class="fw-bold">
                                                    {{$item->date}}
                                                </td>
                                               
                                                <td class="fw-bold">
                                                    <span class="badge bg-light-primary text-primary @if(App\Models\Role::where("id",$item->role_id)->first()->name == 'admin') bg-light-warning text-warning  @endif">
                                                        {{App\Models\Role::where("id",$item->role_id)->first()->label}}
                                                    </span>
                                                </td>
                                                <td class="fw-bold">
                                                    <a href="{{route('users.discount',$item->id)}}"  class="btn btn-sm btn-success">کد تخفیف</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex order-actions">
                                                        
                                                        @if ($item->id != Auth::id())
                                                        <a href="{{route('users.delete',$item->id)}}"
                                                            class="text-danger bg-light-danger border-0"><i
                                                                class='bx bxs-trash'></i></a>
                                                        @endif
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
