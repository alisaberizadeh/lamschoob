@extends('dashboard.layouts.master')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="/assets/dashboard/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <div class="page-wrapper">
        <div class="page-content">





            <div class="row">
                <div class="col">
                    <div class="card border-top border-0 border-4 border-info radius-10 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-1 text-info"> مدیریت محصولات</h5>
                                </div>

                            </div>

                            <div class="table-responsive mt-3">
                                <table class="table align-middle mb-  border border-1 border-gray">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="  border-right border-1 border-gray"># </th>
                                            <th>نام</th>
                                            <th>شماره تلفن</th>
                                            <th>موضوع </th>
                                            <th>تاریخ </th>
                                            <th>مشاهده </th>
                                            <th>عملیات </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($contact as $item)
                                            <tr>
                                                <td class="  border-right border-1 border-gray">{{ $loop->iteration }}</td>

                                                <td class="fw-bold">
                                                    {{ $item->name }}
                                                </td>

                                                <td class="fw-bold">
                                                    {{ $item->mobile }}
                                                </td>


                                                <td class="fw-bold">
                                                    {{ $item->title }}
                                                </td>


                                                <td class="fw-bold">
                                                    {{ $item->date }}
                                                </td>



                                                <td>
                                                    <div class="d-flex order-actions">

                                                        <a href="#"  data-toggle="modal"
                                                        data-target="#myModal_{{$item->id}}"
                                                            class="text-info bg-light-info border-0"><i
                                                            class='bx bxs-show'></i></a>
                                                        

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex order-actions">

                                                        <a href="{{ route('contact.delete', $item->id) }}"
                                                            class="text-danger bg-light-danger border-0"><i
                                                                class='bx bxs-trash'></i></a>

                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- The Modal -->
                                            <div class="modal" id="myModal_{{$item->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">  {{$item->name}}</h4>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            {{$item->text}}
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <a href="{{route('contact.seen',$item->id)}}"   class="btn btn-danger"" > خواندم</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
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
