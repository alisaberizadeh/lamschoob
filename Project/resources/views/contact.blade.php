@extends('layouts.app')

@section('content')
<main class="content">
    <div class="container">
        <div class="contact-us">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-xs-12">
                    <div class="contact-right">
                        <h1>تماس با ما</h1>
                        <div class="contact-item">
                            <i class="fal fa-envelope"></i>
                            <h4>پست الکترونیک
                                <span>info@vira.com</span>
                            </h4>
                        </div>
                        <div class="contact-item">
                            <i class="fal fa-phone"></i>
                            <h4>شماره تماس
                                <span>09221319097</span>
                            </h4>
                        </div>
                        <div class="contact-item">
                            <i class="fal fa-map"></i>
                            <h4>آدرس 
                                <span> تهران - بازار مبل یافت آباد    </span>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-xs-12 mt-3">
                    <div class="contact-left">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger fw-bold ">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <form action="" method="POST"> @csrf
                            <div class="contact-item">
                                <label for="#">
                                    نام  
                                </label>
                                <br>
                                <input type="text" name="name" class="input-contact your-name">
                            </div>
                            <div class="contact-item">
                                <label for="#">
                                    شماره تلفن  
                                </label>
                                <br>
                                <input type="text" name="mobile" maxlength="11" class="input-contact your-email">
                            </div>
                            <div class="contact-item">
                                <label for="#">
                                    موضوع  
                                </label>
                                <br>
                                <input type="text" name="title" class="input-contact your-subject">
                            </div>
                            <div class="contact-item">
                                <label for="#">
                                    پیام شما  
                                </label>
                                <br>
                                <textarea cols="40" rows="10" name="text" class="textarea-contact your-message"></textarea>
                            </div>
                            <div class="contact-item">
                                <button type="submit" class="btn btn-dark send-contact">ارسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
