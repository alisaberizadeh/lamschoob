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
                                    <h5 class="mb-1 text-info">محصول جدید </h5>
                                </div>
                                <div class="ms-auto">
                                    <a href="{{ route('products') }}" class="btn btn-info btn-sm radius-30">مشاهده همه
                                        محصولات</a>
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
                                    <label class="form-label">عنوان محصول <span class="text-danger">*</span> </label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                        required>
                                </div>


                                <div class="col-md-3">
                                    <label class="form-label">شناسه یکتا محصول <span class="text-danger">*</span> </label>
                                    <input type="text" name="code" class="form-control" value="{{ old('code') }}"
                                        required>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">تصاویر محصول <span class="text-danger">*</span></label>
                                    <input type="file" name="file[]" multiple class="form-control "
                                        value="{{ old('file') }}" required>
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label">دسته بندی محصول <span class="text-danger">*</span> </label>
                                    <select name="category" class="form-control" required>
                                        <option value="null">--- انتخاب کنید --- </option>
                                        @foreach (App\Models\Category::orderBY('id', 'DESC')->get() as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">قیمت (تومان) <span class="text-danger">*</span> </label>
                                    <input type="number" name="price" class="form-control" value="{{ old('price') }}"
                                        required>
                                </div>




                                <div class="col-md-3">
                                    <label class="form-label">تخفیف (%) </label>
                                    <input type="number" name="discount" class="form-control"
                                        value="{{ old('discount') }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label"> توضیحات کوتاه <span class="text-danger">*</span> </label>
                                    <textarea name="short_description" id="short_description" class="form-control" required rows="5">{{ old('short_description') }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label"> توضیحات تکمیلی </label>
                                    <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                                </div>
                                {{-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> --}}

                                <script>
                                    CKEDITOR.replace('short_description', {
                                        language: 'fa',
                                        content: 'fa',
                                    });
                                    CKEDITOR.replace('description', {
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
