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
                                <h5 class="mb-0 text-info">کد های تخفیف "{{$user->name}}"</h5>
                            </div>

                            <div class="table-responsive mt-3">
                                <table class="table align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th># </th>
                                            <th>کد</th>
                                            <th>تخفیف </th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($discounts as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>{{ $item->code }}</td>
                                                <td> <span class="badge bg-light-primary text-primary"> {{ $item->discount }}%</span></td>

                                                <td>
                                                    <div class="d-flex order-actions">
                                                        <form action="{{ route('discounts.delete', $item->id) }}"
                                                            method="POST" id="delete_form"> @csrf </form>
                                                        <a href="discounts/delete"
                                                            onclick="event.preventDefault();document.getElementById('delete_form').submit()"
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
                                <h5 class="mb-0 text-info"> کد تخفیف جدید برای "{{$user->name}}"</h5>
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




                            <form class="row g-3" action="" method="POST"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="col-md-6">
                                    <label class="form-label"> <span class="text-danger">*</span> کد تخفیف </label>
                                    <input type="text" name="code" value="{{ old('code') }}" class="form-control ">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label"> <span class="text-danger">*</span> مقدار تخفیف (%) </label>
                                    <input type="number" name="discount" value="{{ old('discount') }}"
                                        class="form-control ">
                                </div>
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
