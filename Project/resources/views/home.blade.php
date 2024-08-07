@extends('layouts.app')

@section('content')
    <main class="content">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-8">
                    <div class="main-slider">
                        <div class="swiper mySwiper mainSlider">
                            <div class="swiper-wrapper">

                                @foreach (App\Models\Slider::orderBy('id', 'DESC')->get() as $item)
                                    <div class="swiper-slide">
                                        <a href="{{$item->link}}">
                                            <img src="{{$item->src}}" class="img-fluid"
                                                alt="لمس چوب">
                                        </a>
                                    </div>
                                @endforeach



                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 col-sm-6 col-12">
                            <div class="banner mb-3">
                                <a href="{{App\Models\Banner::where('position','top')->first()->link}}">
                                    <img src="{{App\Models\Banner::where('position','top')->first()->src}}" alt="banner">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-6 col-12">
                            <div class="banner">
                                <a href="{{App\Models\Banner::where('position','bottom')->first()->link}}">
                                    <img src="{{App\Models\Banner::where('position','bottom')->first()->src}}" alt="banner">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- category Box --}}
        <div class="container">
            <div class="row">
                <div class="categoryBox col-lg-12">
                    @foreach (App\Models\Category::orderBy('id', 'DESC')->get() as $item)
                        <a href="{{route("shop",['category' => $item->id])}}" class="categoryBox__item">
                            <img src="{{ $item->src }}" alt="">
                            <span>{{ $item->title }}</span>
                        </a>
                    @endforeach


                </div>
            </div>
        </div>

        {{-- category Box --}}


        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <section class="product-carousel">
                        <div class="product-heading">
                            <div class="title">
                                <i class="fal fa-layer-plus"></i> جدیـدترین محصـولات
                            </div>
                            <a href="/shop" class="view-more">
                                <i class="fal fa-angle-left"></i> مشاهده همه
                            </a>
                        </div>
                        <div class="block-content-wrap mt-3">
                            <div class="swiper mySwiper sliderProduct">
                                <div class="swiper-wrapper">

                                    @foreach ($products as $item)
                                        <div class="swiper-slide">
                                            <div class="item-area item-general">
                                                <div class="product-image-area">
                                                    <a href="{{ route('products.single', $item->id) }}"
                                                        class="product-image">
                                                        @if ($item->discount != null)
                                                            <div class="product-label">
                                                                <span>{{ $item->discount }}%</span>
                                                            </div>
                                                        @endif



                                                        <img src="{{ App\Models\Gallery::where('product_id', $item->id)->first()->src }}"
                                                            alt="{{ $item->title }}">
                                                    </a>
                                                </div>
                                                <div class="product-detail-area">
                                                    <div class="price">
                                                        @if ($item->discount != null)
                                                            <del>
                                                                <span class="price-amount">
                                                                    {{ number_format($item->price) }}
                                                                    <span class="price-currencySymbol">تومان</span>
                                                                </span>
                                                            </del>
                                                        @endif


                                                        <ins>
                                                            <span
                                                                class="price-amount">{{ number_format($item->final_price) }}
                                                                <span class="price-currencySymbol">تومان</span>
                                                            </span>
                                                        </ins>
                                                    </div>
                                                    <h3 class="product-name">
                                                        <a
                                                            href="{{ route('products.single', $item->id) }}">{{ $item->title }}</a>
                                                    </h3>
                                                    <div class="actions">

                                                        <ul class="add-to-links">


                                                            <li>
                                                                <div class="add-to-cart">
                                                                    <form action="{{route('cart.add', $item->id)}}" method="POST" id="add_cart_{{$item->id}}"> @csrf </form>
                                                                    <a href="cart" onclick="event.preventDefault();document.getElementById('add_cart_{{$item->id}}').submit()" title="افزودن به سبد">
                                                                        <i class="fal fa-shopping-cart"></i>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach




                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="product-carousel">
                        <div class="product-heading mt-4">
                            <div class="title">
                                <i class="fal fa-layer-plus"></i> پیشنهادات و تخفیفات
                            </div>
                            <a href="/shop" class="view-more">
                                <i class="fal fa-angle-left"></i> مشاهده همه
                            </a>
                        </div>
                        <div class="block-content-wrap mt-3">
                            <div class="swiper mySwiper sliderProduct">
                                <div class="swiper-wrapper">
                                    @foreach (App\Models\Offer::orderBy('id','DESC')->get() as $item)
                                    <div class="swiper-slide">
                                        <div class="item-area item-general">
                                            <div class="product-image-area">
                                                <a href="{{ route('products.single', App\Models\Product::where("id",$item->product_id)->first()->id) }}"
                                                    class="product-image">
                                                    @if (App\Models\Product::where("id",$item->product_id)->first()->discount != null)
                                                        <div class="product-label">
                                                            <span>{{ App\Models\Product::where("id",$item->product_id)->first()->discount }}%</span>
                                                        </div>
                                                    @endif



                                                    <img src="{{ App\Models\Gallery::where('product_id', App\Models\Product::where("id",$item->product_id)->first()->id)->first()->src }}"
                                                        alt="{{ App\Models\Product::where("id",$item->product_id)->first()->title }}">
                                                </a>
                                            </div>
                                            <div class="product-detail-area">
                                                <div class="price">
                                                    @if (App\Models\Product::where("id",$item->product_id)->first()->discount != null)
                                                        <del>
                                                            <span class="price-amount">
                                                                {{ number_format(App\Models\Product::where("id",$item->product_id)->first()->price) }}
                                                                <span class="price-currencySymbol">تومان</span>
                                                            </span>
                                                        </del>
                                                    @endif


                                                    <ins>
                                                        <span
                                                            class="price-amount">{{ number_format(App\Models\Product::where("id",$item->product_id)->first()->final_price) }}
                                                            <span class="price-currencySymbol">تومان</span>
                                                        </span>
                                                    </ins>
                                                </div>
                                                <h3 class="product-name">
                                                    <a
                                                        href="{{ route('products.single', App\Models\Product::where("id",$item->product_id)->first()->id) }}">{{ App\Models\Product::where("id",$item->product_id)->first()->title }}</a>
                                                </h3>
                                                <div class="actions">

                                                    <ul class="add-to-links">


                                                        <li>
                                                            <div class="add-to-cart">
                                                                <form action="{{route('cart.add', App\Models\Product::where("id",$item->product_id)->first()->id)}}" method="POST" id="add_cart_{{App\Models\Product::where("id",$item->product_id)->first()->id}}"> @csrf </form>
                                                                <a href="cart" onclick="event.preventDefault();document.getElementById('add_cart_{{App\Models\Product::where("id",$item->product_id)->first()->id}}').submit()" title="افزودن به سبد">
                                                                    <i class="fal fa-shopping-cart"></i>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="product-carousel">
                        <div class="product-heading mt-4">
                            <div class="title">
                                <i class="fal fa-layer-plus"></i> محبوب ترین محصولات  
                            </div>
                            <a href="/shop" class="view-more">
                                <i class="fal fa-angle-left"></i> مشاهده همه
                            </a>
                        </div>
                        <div class="block-content-wrap mt-3">
                            <div class="swiper mySwiper sliderProduct">
                                <div class="swiper-wrapper">
                                    @foreach (App\Models\Favorite::orderBy('id','DESC')->get() as $item)
                                    <div class="swiper-slide">
                                        <div class="item-area item-general">
                                            <div class="product-image-area">
                                                <a href="{{ route('products.single', App\Models\Product::where("id",$item->product_id)->first()->id) }}"
                                                    class="product-image">
                                                    @if (App\Models\Product::where("id",$item->product_id)->first()->discount != null)
                                                        <div class="product-label">
                                                            <span>{{ App\Models\Product::where("id",$item->product_id)->first()->discount }}%</span>
                                                        </div>
                                                    @endif



                                                    <img src="{{ App\Models\Gallery::where('product_id', App\Models\Product::where("id",$item->product_id)->first()->id)->first()->src }}"
                                                        alt="{{ App\Models\Product::where("id",$item->product_id)->first()->title }}">
                                                </a>
                                            </div>
                                            <div class="product-detail-area">
                                                <div class="price">
                                                    @if (App\Models\Product::where("id",$item->product_id)->first()->discount != null)
                                                        <del>
                                                            <span class="price-amount">
                                                                {{ number_format(App\Models\Product::where("id",$item->product_id)->first()->price) }}
                                                                <span class="price-currencySymbol">تومان</span>
                                                            </span>
                                                        </del>
                                                    @endif


                                                    <ins>
                                                        <span
                                                            class="price-amount">{{ number_format(App\Models\Product::where("id",$item->product_id)->first()->final_price) }}
                                                            <span class="price-currencySymbol">تومان</span>
                                                        </span>
                                                    </ins>
                                                </div>
                                                <h3 class="product-name">
                                                    <a
                                                        href="{{ route('products.single', App\Models\Product::where("id",$item->product_id)->first()->id) }}">{{ App\Models\Product::where("id",$item->product_id)->first()->title }}</a>
                                                </h3>
                                                <div class="actions">

                                                    <ul class="add-to-links">


                                                        <li>
                                                            <div class="add-to-cart">
                                                                <form action="{{route('cart.add', App\Models\Product::where("id",$item->product_id)->first()->id)}}" method="POST" id="add_cart_{{App\Models\Product::where("id",$item->product_id)->first()->id}}"> @csrf </form>
                                                                <a href="cart" onclick="event.preventDefault();document.getElementById('add_cart_{{App\Models\Product::where("id",$item->product_id)->first()->id}}').submit()" title="افزودن به سبد">
                                                                    <i class="fal fa-shopping-cart"></i>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>


            <section class="product-carousel articles">
                <div class="product-heading mt-4">
                    <div class="title">
                        <i class="fal fa-list-alt"></i> مقالات
                    </div>
                </div>
                <div class="block-content-wrap mt-3">
                    <div class="swiper mySwiper sliderProduct sliderBlog">
                        <div class="swiper-wrapper">

                            @foreach (App\Models\Article::take(7)->orderBy("id","DESC")->get() as $item)
                            <div class="swiper-slide">
                                <div class="item">
                                    <div class="item-area item-general">
                                        <div class="product-image-area">
                                            <a href="{{route('articles.single',$item->id)}}" class="product-image">
                                                <img src="{{$item->src}}" class="img-fluid"
                                                    alt="{{$item->title}}">
                                            </a>
                                            <div class="blog-category">وبلاگ</div>
                                        </div>
                                        <div class="product-detail-area">
                                            <h3 class="product-name">
                                                <a href="{{route('articles.single',$item->id)}}">  {{$item->title}} </a>
                                            </h3>
                                            <div class="post-date">{{$item->date}}</div>
                                            <a href="{{route('articles.single',$item->id)}}" class="read-more"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            @endforeach
                           
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
