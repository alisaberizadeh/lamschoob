@extends('dashboard.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">


            <div class="row">
 
                <div class="col-lg-12">
                    <div class="card  border-top border-0 border-4 border-info radius-10 mb-0">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bx-plus me-1 font-22 text-info"></i>
                                </div>
                                <h5 class="mb-0 text-info">ویرایش دسته بندی   </h5>
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
                                    <label class="form-label">تصویر <span class="text-danger">*</span></label>
                                    <input type="file" name="file" value="{{ old('file') }}" class="form-control "
                                        placeholder="تصویر را انتخاب کنید">
                                        <input type="hidden" name="last_file" value="{{$category->src}}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">عنوان <span class="text-danger">*</span></label>
                                    <input type="text" name="title"  class="form-control " value="{{$category->title}}">
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
