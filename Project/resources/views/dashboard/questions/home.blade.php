@extends('dashboard.layouts.master')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <div class="page-wrapper">
        <div class="page-content">


            <div class="row">

                <div class="col-lg-6">
                    <div id="accordion">
 
                        @foreach ($questions as $item)
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                              <a class="collapsedcard-link" data-toggle="collapse" href="#collapse_{{$item->id}}">
                                {{$item->title}}
                                
                              </a>
                              <a href="{{ route('questions.delete', $item->id) }}"
                                class="text-danger "><i
                                    class='bx bxs-trash'></i></a>
                            </div>
                            <div id="collapse_{{$item->id}}" class="collapse" data-parent="#accordion">
                              <div class="card-body">
                                {{$item->text}}

                                
                              </div>
                            </div>
                          </div>
                        
                        @endforeach
                        
                      </div>
                </div>
                <div class="col-lg-6">
                    <div class="card  border-top border-0 border-4 border-info radius-10 mb-0">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bx-plus me-1 font-22 text-info"></i>
                                </div>
                                <h5 class="mb-0 text-info"> سوال جدید </h5>
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

                            <form class="row g-3" action=" " method="POST"
                                enctype="multipart/form-data">
                                @csrf
 
                                <div class="col-md-12">
                                    <label class="form-label">سوال </label>
                                    <input type="text" name="title" class="form-control "
                                        placeholder="سوال را وارد کنید" required>
                                </div>
 
                                <div class="col-md-12">
                                    <label class="form-label">پاسخ </label>
                                    <textarea name="text"  class="form-control cols="30" rows="5" required  placeholder="پاسخ را وارد کنید"></textarea>
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
