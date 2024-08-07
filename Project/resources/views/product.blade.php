@extends('layouts.app')

@section('content')
    <main class="content">
        <div class="single-product">
            <div class="container">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">خانه</a></li>
                        <li class="breadcrumb-item active" aria-current="page">محصول</li>
                    </ol>
                </nav>
                <div class="product type-product">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <div class="product-gallery">
                                <div class="gallery">

                                    <div class="gallery-item">
                                        <div class="products-gallery">

                                            @if ($product->discount != null)
                                                <div class="triangle">
                                                    <span>{{ $product->discount }}%</span>
                                                </div>
                                            @endif


                                            <div class="swiper-container gallery-slider pb-md-0 pb-3">
                                                <div class="swiper-wrapper">


                                                    @foreach (App\Models\Gallery::where('product_id', $product->id)->get() as $img)
                                                        <div class="swiper-slide">

                                                            <a href="{{ $img->src }}" class="image-popup-vertical-fit">
                                                                <img src="{{ $img->src }}"
                                                                    data-large="{{ $img->src }}" class="light-zoom"
                                                                    alt="{{ $product->title }} ">
                                                            </a>
                                                        </div>
                                                    @endforeach








                                                </div>
                                                <!-- Add Pagination -->
                                                <div class="swiper-pagination d-md-none"></div>

                                            </div>




                                            <div
                                                class="swiper-container gallery-slider-thumbs mt-2 d-md-block d-none swiper-initialized swiper-horizontal swiper-pointer-events swiper-rtl">
                                                <div class="swiper-wrapper" id="swiper-wrapper-0a610b29369ed9dff"
                                                    aria-live="polite"
                                                    style="transition-duration: 0ms; transform: translate3d(-82.6px, 0px, 0px);">

                                                    @foreach (App\Models\Gallery::where('product_id', $product->id)->get() as $img)
                                                        <div class="swiper-slide swiper-slide-prev" role="group"
                                                            aria-label="1 / 4" style="width: 82.6px;">
                                                            <img src="{{ $img->src }}" alt="{{ $product->title }} ">
                                                        </div>
                                                    @endforeach




                                                </div>
                                                <!-- Add Arrows -->
                                                <div class="swiper-button-next" tabindex="0" role="button"
                                                    aria-label="Next slide" aria-controls="swiper-wrapper-0a610b29369ed9dff"
                                                    aria-disabled="false"></div>
                                                <div class="swiper-button-prev" tabindex="0" role="button"
                                                    aria-label="Previous slide"
                                                    aria-controls="swiper-wrapper-0a610b29369ed9dff" aria-disabled="false">
                                                </div>
                                                <span class="swiper-notification" aria-live="assertive"
                                                    aria-atomic="true"></span>
                                            </div>




                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-xs-12">
                            <div class="product-info">
                                <div class="product-headline">
                                    <h1 class="product-title">{{ $product->title }}</h1>
                                </div>
                                <div class="product-meta">
                                    <span class="posted">
                                        <span class="detail-label">دسته بندی: </span>
                                        <span class="detail-content">
                                            <a
                                                href="{{ route('shop', ['category' => App\Models\Category::where('id', $product->category_id)->first()->id]) }}">
                                                {{ App\Models\Category::where('id', $product->category_id)->first()->title }}
                                            </a>

                                        </span>
                                    </span>
                                </div>
                                <div class="product-params">
                                    {!! $product->short_description !!}
                                </div>
                                <div class="price">
                                    @if ($product->discount != null)
                                        <del>
                                            <span class="price-amount">
                                                {{ number_format($product->price) }}
                                                <span class="price-currencySymbol">تومان</span>
                                            </span>
                                        </del>
                                    @endif
                                    <ins>
                                        <span class="price-amount">{{ number_format($product->final_price) }}
                                            <span class="price-currencySymbol">تومان</span>
                                        </span>
                                    </ins>
                                </div>
                                <div class="add-to-cart">

                                    <form action="{{ route('cart.add', $product->id) }}" method="POST"> @csrf
                                        <button type="submit" class="btn btn-success add-to-cart-btn">
                                            افزودن به سبد خرید
                                        </button>
                                    </form>

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-xs-12">
                            <div class="product-seller-info">

                                <hr>
                                <div class="product-seller-row">
                                    <div class="modified-date">
                                        <i class="fal fa-calendar-check"></i>
                                        تاریخ انتشار :
                                        <span> {{ $product->date }} </span>
                                    </div>
                                </div>
                                <div class="product-seller-row">
                                    <div class="product-stock">
                                        <i class="fal fa-check-square"></i>
                                        <span>موجود است</span>
                                    </div>
                                </div>

                                <div class="recommended">
                                    <i class="fal fa-file-certificate"></i>
                                    پیشنهاد شده توسط بیش از
                                    <span>7</span>
                                    نفر از خریداران
                                </div>

                                <div class="product-feature">
                                    <div class="service-item">
                                        <img src="/assets/images/pageProduct/service/price-tag-1.png" alt="service">
                                        تضمین بهترین قیمت
                                    </div>
                                    <div class="service-item">
                                        <img src="/assets/images/pageProduct/service/shield-1.png" alt="service">
                                        ضمانت اصل بودن
                                    </div>
                                    <div class="service-item">
                                        <img src="/assets/images/pageProduct/service/delivery-truck-3.png" alt="service">
                                        ارسال به تمام ایران
                                    </div>
                                    <div class="service-item">
                                        <img src="/assets/images/pageProduct/service/gift-2.png" alt="service">
                                        بسته بندی زیبا
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tabs">
                        <div class="tab-box">
                            <ul class="tab nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item description">
                                    <a class="nav-link active" id="des-tab" data-toggle="tab" href="#des"
                                        role="tab" aria-controls="des" aria-selected="true">
                                        توضیحات
                                    </a>
                                </li>

                                <li class="nav-item comment-user">
                                    <a class="nav-link" id="user-tab" data-toggle="tab" href="#user" role="tab"
                                        aria-controls="user" aria-selected="true">
                                        نظرات کاربران
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="tabs-content">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="des" role="tabpanel"
                                    aria-labelledby="des-tab">

                                    <div class="entry-content-inner content-expert-summary">
                                        <div class="mask pm-3">
                                            <div class="mask-text">
                                                <p>
                                                    {!! $product->description !!}

                                                </p>
                                            </div>
                                            <a href="#" class="mask-handler">
                                                <span class="show-more">+ ادامه مطلب</span>
                                                <span class="show-less">- بستن</span>
                                            </a>
                                            <div class="shadow-box"></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
                                    <div class="content-heading">
                                        <i class="fal fa-comment-alt-lines"></i>
                                        <div class="heading">
                                            <span class="title">نظرات کاربران</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="comment-override col-lg-6">

                                            <ol class="commentlist">

                                                @foreach ($comments as $item)
                                                    <li>
                                                        <div class="row">

                                                            <div class="col-12 col-sm-12">
                                                                <div class="comment-content">
                                                                    <div class="meta">
                                                                        توسط
                                                                        <strong class="author"> {{ $item->name }}
                                                                        </strong>
                                                                        <span class="dash">در تاریخ </span>
                                                                        <time class="published-date"> {{ $item->date }}
                                                                        </time>
                                                                    </div>

                                                                    <div class="description">
                                                                        <p>
                                                                            {{ $item->text }}
                                                                        </p>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                        </div>
                                                    </li>
                                                @endforeach

                                                @if (count($comments) < 1)
                                                    <h5>دیدگاه وجود ندارد !!!</h5>
                                                @endif



                                            </ol>
                                        </div>
                                        <div class="col-lg-6 col-xs-12">
                                            <span class="comment-reply-title">دیدگاه خود را بنویسید </span>
                                            @if ($errors->any())
                                                <script>
                                                    Swal.fire({
                                                        title: "خطا",
                                                        text: "لطفا اطلاعات را صحیح وارد کنید",
                                                        icon: 'error',
                                                        confirmButtonText: ' باشه ',
                                                        timer: 3000,
                                                        timerProgressBar: true,
                                                    })
                                                </script>
                                            @endif
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul class="m-0">
                                                        @foreach ($errors->all() as $error)
                                                            <li class="text-danger fw-bold ">{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <form action=" {{ route('products.comment.add', $product->id) }} "
                                                method="POST" class="comment-form">
                                                @csrf

                                                <div class="row">
                                                    <div class="col-12 col-sm-6 mt-3">
                                                        <div class="form-row-title strengths mb-2">
                                                            نام شما
                                                        </div>
                                                        <div id="advantages">
                                                            <div class="ui-input--add-point">
                                                                <input class="input-ui pr-2 ui-input-field" type="text"
                                                                    id="advantage-input" autocomplete="off"
                                                                    value="{{ old('name') }}" name="name">

                                                            </div>
                                                            <div class="form-comment-dynamic-labels js-advantages-list">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-3">
                                                        <div class="form-row-title strengths mb-2">
                                                            ایمیل شما
                                                        </div>
                                                        <div id="advantages">
                                                            <div class="ui-input--add-point">
                                                                <input class="input-ui pr-2 ui-input-field" type="email"
                                                                    id="advantage-input" autocomplete="off"
                                                                    value="{{ old('email') }}" name="email">

                                                            </div>
                                                            <div class="form-comment-dynamic-labels js-advantages-list">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <div class="comment-form-comment">
                                                            <div class="form-row-title strengths mb-2">
                                                                پیام شما
                                                            </div>
                                                            <textarea id="comment" name="text" cols="45" rows="8" aria-required="true" required="">{{ old('text') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <button type="submit" class="btn btn-dark record">ثبت</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
