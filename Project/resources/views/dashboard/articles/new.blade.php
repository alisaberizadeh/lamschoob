@extends('dashboard.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">





            <div class="row">
                <div class="col">
                    <div class="card radius-10 border-top border-0 border-4 border-info  mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-5">
                                <div>
                                    <h5 class="mb-1 text-info">مقاله جدید </h5>
                                </div>
                                <div class="ms-auto">
                                    <a href="{{ route('articles') }}" class="btn btn-info btn-sm radius-30">مشاهده همه
                                        مقالات</a>
                                </div>
                            </div>



                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="m-0">
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger fw-bold ">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-6">
                                    <label class="form-label">عنوان مقاله <span class="text-danger">*</span> </label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                        required>
                                </div>
 
                                <div class="col-md-6">
                                    <label class="form-label">تصویر شاخص   <span class="text-danger">*</span></label>
                                    <input type="file" name="file"   class="form-control "
                                        value="{{ old('file') }}" required>
                                </div>
   

                                <div class="col-md-12">
                                    <label class="form-label"> توضیحات   <span class="text-danger">*</span></label>
                                    <textarea name="text" class="form-control" rows="10">{{ old('description') }}</textarea>
                                </div>
 
                                <script>
                                    CKEDITOR.replace('text', {
                                        language: 'fa',
                                        content: 'fa',
                                    });
                                 
                                </script>

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
