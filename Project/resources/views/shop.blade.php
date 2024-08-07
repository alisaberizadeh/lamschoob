@extends('layouts.app')

@section('content')
    <main class="content mt-3" style="transform: none;">
        <div class="container" style="transform: none;">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">خانه</a></li>
                    <li class="breadcrumb-item active" aria-current="page">فروشگاه</li>
                </ol>
            </nav>
            <div class="sidebar-listing" style="transform: none;">
                <div class="row mb-5" style="transform: none;">
                    <div class="col-lg-3 sticky-sidebar"
                        style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

                        <div class="theiaStickySidebar"
                            style="padding-top: 1px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 1026.75px;">
                            <div class="sidebar-widget sidebar-widget-filter">

                                <div class="widget woocommerce widget-product-categories">


                                    @foreach (App\Models\Category::orderBy('id', 'DESC')->get() as $item)
                                        <div class="accr-header">
                                            <a href="?category={{ $item->id }}"> {{ $item->title }}</a>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-xs-12">
                        <header class="products-header">
                            <h1 class="title">
                                <i class="fal fa-poll-h"></i>
                                فروشگاه
                            </h1>
                        </header>

                        <div class="js-listing">


                            <div class="products">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="Most-visited" role="tabpanel"
                                        aria-labelledby="Most-visited-tab">
                                        @foreach ($products as $item)
                                            <div class="col-lg-3 col-md-4 col-xs-12 fr">
                                                <div class="product-card">
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
                                                            <a href="{{ route('products.single', $item->id) }}">
                                                                {{ $item->title }}</a>
                                                        </h3>
                                                        <div class="actions">

                                                            <ul class="add-to-links">

                                                                <li>
                                                                    <div class="add-to-cart">
                                                                        <form action="{{ route('cart.add', $item->id) }}"
                                                                            method="POST"
                                                                            id="add_cart_{{ $item->id }}"> @csrf
                                                                        </form>
                                                                        <a href="cart"
                                                                            onclick="event.preventDefault();document.getElementById('add_cart_{{ $item->id }}').submit()"
                                                                            title="افزودن به سبد">
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

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
@endsection
