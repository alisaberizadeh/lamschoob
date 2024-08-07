@extends('dashboard.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">





            <div class="row">
                <div class="col">
                    @if (count(App\Models\Comment::where("active",'0')->get()) > 0)
                    <div class="card border-top border-0 border-4 border-danger radius-10 mb-5">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-1 text-danger">  نظرات  جدید  </h5>
                                </div>
                             
                            </div>

                            <div class="table-responsive mt-3">
                                <table class="table align-middle mb-  border border-1 border-gray">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="  border-right border-1 border-gray"># </th>
                                            <th>نویسنده    </th>
                                            <th>ایمیل    </th>
                                            <th>تاریخ ارسال  </th>
                                            <th>دیدگاه</th>
                                            <th>برای محصول</th>
                                            <th>وضعیت</th>
                                             <th>عملیات </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($new_comments as $item)
                                            <tr>
                                                <td class="  border-right border-1 border-gray">{{ $loop->iteration }}</td>
                                                <td class="fw-bold">{{$item->name}}</td>
                                                <td class="fw-bold">{{$item->email}}</td>
                                                <td class="fw-bold">{{$item->date}}</td>
                                                 <td class="fw-bold">{{$item->text}}</td>
                                                 <td class="fw-bold">
                                                    {{App\Models\Product::where("id",$item->product_id)->first()->title}}
                                                 </td>
                                                 
                                                 <td  class="fw-bold"><span
                                                        class="badge bg-light-danger  fw-bold text-danger "> غیر فعال </span>
                                                         
                                                </td>
                                                
                                                <td>
                                                    <div class="d-flex order-actions">

                                                        <a href="{{route('comments.active',$item->id)}}" class=" text-success bg-light-success border-0"><i class='bx bx-check'></i></a>

                                                         <a href="{{route('comments.delete',$item->id)}}" class="ms-4 text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
                                                       
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                            @endif
                    
                    <div class="card border-top border-0 border-4 border-success radius-10 mb-0 ">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-1 text-success">لیست نظرات    </h5>
                                </div>
                             
                            </div>

                            <div class="table-responsive mt-3">
                                <table class="table align-middle mb-  border border-1 border-gray">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="  border-right border-1 border-gray"># </th>
                                            <th>نویسنده    </th>
                                            <th>ایمیل    </th>
                                            <th>تاریخ ارسال  </th>
                                            <th>دیدگاه</th>
                                            <th>برای محصول</th>
                                            <th>وضعیت</th>
                                             <th>عملیات </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($comments as $item)
                                            <tr>
                                                <td class="  border-right border-1 border-gray">{{ $loop->iteration }}</td>
                                                <td class="fw-bold">{{$item->name}}</td>
                                                <td class="fw-bold">{{$item->email}}</td>
                                                <td class="fw-bold">{{$item->date}}</td>
                                                <td class="fw-bold">{{$item->text}}</td>
                                                <td class="fw-bold">
                                                    {{App\Models\Product::where("id",$item->product_id)->first()->title}}
                                                 </td>                                                 
                                                 <td  class="fw-bold"><span
                                                        class=" fw-bold text-success badge bg-light-success"> فعال </span>
                                                         
                                                </td>
                                                
                                                <td>
                                                    <div class="d-flex order-actions"> 
                                                        <a href="{{route('comments.delete',$item->id)}}" class="ms-4 text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
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
