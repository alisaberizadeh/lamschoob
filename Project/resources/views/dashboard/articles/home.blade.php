@extends('dashboard.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">





            <div class="row">
                <div class="col">
                    <div class="card border-top border-0 border-4 border-info radius-10 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-1 text-info">مدیریت مقالات</h5>
                                </div>
                                <div class="ms-auto">
                                    <a href="{{ route('articles.new') }}" class="btn btn-info btn-sm radius-30">
                                        مقاله جدید <i class="bx bx-plus"></i></a>
                                </div>
                            </div>

                            <div class="table-responsive mt-3">
                                <table class="table align-middle mb-  border border-1 border-gray">
                                    <thead class="table-light">
                                        <tr >
                                            <th class="  border-right border-1 border-gray"># </th>
                                             <th>عنوان</th>
                                             <th>تاریخ</th>
                                            <th>عملیات </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($articles as $item)
                                            <tr>
                                                <td class="  border-right border-1 border-gray">{{ $loop->iteration }}</td>
                                                 <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="recent-product-img">
                                                            <img src="{{ $item->src}}"
                                                                alt="">
                                                        </div>
                                                        <div class="ms-2">
                                                            <h6 class="mb-1 font-14 fw-bold">{{$item->title}} 
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                               
                                                 
                                                
                                                <td class="fw-bold">
                                                    {{$item->date}}
                                                </td>
                                                <td>
                                                    <div class="d-flex order-actions"> <a href="{{route('articles.delete',$item->id)}}"
                                                            class="text-danger bg-light-danger border-0"><i
                                                                class='bx bxs-trash'></i></a>
                                                        <a href="{{route('articles.edit',$item->id)}}"
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
