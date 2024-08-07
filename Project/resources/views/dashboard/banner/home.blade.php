@extends('dashboard.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">


            <div class="row">

              
                <div class="col-lg-6">
                    <div class="card  border-top border-0 border-4 border-info radius-10 mb-0">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bx-edit me-1 font-22 text-info"></i>
                                </div>
                                <h5 class="mb-0 text-info"> بنر   (بالا)   </h5>
                            </div>
                            <hr>
                            <img src="{{$banner1->src}}" width="80" class="mb-3" alt="">


                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="m-0">
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger fw-bold ">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="row g-3" action="{{ route('banners.top') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-6">
                                    <label class="form-label">تصویر <span class="text-danger">*</span></label>
                                    <input type="file" name="file" class="form-control "
                                        placeholder="تصویر را انتخاب کنید" required>
                                        <input type="hidden" name="nowFile" value="{{$banner1->src}}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">لینک </label>
                                    <input type="text" name="link" value="{{$banner1->link}}" class="form-control "
                                        placeholder="لینک تصویر را وارد کنید">
                                </div>


                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-info px-5">بروزرسانی </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
           
                <div class="col-lg-6">
                    <div class="card  border-top border-0 border-4 border-info radius-10 mb-0">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bx-edit me-1 font-22 text-info"></i>
                                </div>
                                <h5 class="mb-0 text-info"> بنر   (پایین)   </h5>
                            </div>
                            <hr>
                            <img src="{{$banner2->src}}" width="80" class="mb-3" alt="">


                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="m-0">
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger fw-bold ">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="row g-3" action="{{ route('banners.bottom') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-6">
                                    <label class="form-label">تصویر <span class="text-danger">*</span></label>
                                    <input type="file" name="file" class="form-control "
                                        placeholder="تصویر را انتخاب کنید" required>
                                        <input type="hidden" name="nowFile" value="{{$banner2->src}}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">لینک </label>
                                    <input type="text" name="link" value="{{$banner2->link}}" class="form-control "
                                        placeholder="لینک تصویر را وارد کنید">
                                </div>


                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-info px-5">بروزرسانی </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
           
            </div>






        </div>
    </div>
@endsection
