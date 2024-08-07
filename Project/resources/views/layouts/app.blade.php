<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:title" content="فروشگاه اینترنتی لمس چوب" />
    <meta property="og:description" content="فروش انواع سرویس خواب ، میز تیوی ، جاکفشی ، کنسول ، کمد لباس ، میز تحریر و ..." />
    <meta property="og:type" content="store" />
    <meta property="og:locale" content="fa" />
    <meta property="og:site_name" content="فروشگاه اینترنتی لمس چوب" />
    <meta property="og:url" content="https://lamschoob.com/" />
    <meta property="og:image" content="/assets/images/logo.png" />
    <meta name="keywords" content="لمس چوب,گروه صنعتی لمس چوب,فروشگاه لمس چوب,فروشگاه اینترنتی لمس چوب,وب سایت لمس چوب,سایت لمس چوب,سرویس خواب لمس چوب,کمد لمس چوب,جاکفشی لمس چوب,میز تیوی لمس چوب,lamschoob">
    <meta name="description"  content="فروش انواع سرویس خواب ، میز تیوی ، جاکفشی ، کنسول ، کمد لباس ، میز تحریر و ...">


    <title>فروشگاه اینترنتی لمس چوب</title>

    <link rel="canonical" href="https://bastamhoney.ir/" />
  
    <!-- fontAwesome -->
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="/assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/noUISlider.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/light-zoom.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/plugins/bootstrap-slider.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/apexcharts.css">
    <!-- mainStyle -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="/assets/images/logo.png">



</head>

<body>
    <!-- header -->
    <header class="header">
        <div class="top-page-header">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="top-header-menu">
                        <span>به وبسایت گروه صنعتی " لمس چوب " خوش آمدید </span>
                    </div>
                    <div class="user-items">
                        <!-- items -->
                        @auth
                            <div class="user-item account">
                                <a href="#" class="user-login">
                                    <i class="fal fa-user"></i>
                                    <span class="title">{{ auth()->user()->name }} </span>
                                </a>
                                <div class="my-account">
                                    <ul>
                                        @if (auth()->user()->type == 1)
                                            <li class="account-item">
                                                <a href="{{ route('dashboard.panel') }}"> پنل ادمین </a>

                                            </li>
                                            <li class="account-item">
                                                <a href="{{ route('user.panel') }}"> حساب کاربری</a>
                                            </li>
                                        @endif
                                        @if (auth()->user()->type == 2)
                                            <li class="account-item">
                                                <a href="{{ route('user.panel') }}"> حساب کاربری</a>

                                            </li>
                                        @endif

                                        <li class="account-item">
                                            <form action="{{ route('logout') }}" method="POST" id="logout_form">@csrf
                                            </form>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();document.getElementById('logout_form').submit()">خروج</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endauth
                        @guest
                            <div class="user-item account">
                                <a href="{{ route('register') }}" class="user-login">
                                    <i class="fal fa-user"></i>
                                    <span class="title">ثبت نام / ورود</span>
                                </a>
                            </div>
                        @endguest
                        <!-- items -->
                        <div class="user-item cart-list">
                            <div class="top-icons shop-cart" id="offcanvas-trigger-cart">
                                <a href="#">
                                    <i class="fal fa-shopping-bag"></i>
                                    <div class="cart-title">
                                        <span>سبد خرید</span>
                                        @auth
                                            <div class="shop-badge header-cart-count">
                                                {{ count(App\Models\Cart::where('user_id', Auth::id())->get()) }}</div>
                                        @endauth
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <nav id="offcanvasCart" class="offcanvas offcanvas-cart">
                        <div class="offcanvas-bar">
                            <div class="offcanvas-header">
                                <div class="d-flex align-items-center justify-content-between mb-12">
                                    <strong>سبد خرید
                                    </strong>
                                    <div class="cart-sidebar-close close-sidebar" id="offcanvas-dismiss-cart">
                                        <i class="fal fa-times"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="offcanvas-shopping-cart-content">
                                <div class="wrapper">
                                    <div class="scrollbar" id="style-1">
                                        <div class="force-overflow">
                                            <div class="offcanvas-body">
                                                <ul>
                                                    @php
                                                        $sum = 0;
                                                    @endphp

                                                    @foreach (App\Models\Cart::where('user_id', Auth::id())->orderBy('id', 'DESC')->get() as $item)
                                                        <li
                                                            class="cart-item d-flex align-items-center justify-content-between">
                                                            <span class="d-flex align-items-center mb-2">
                                                                <a href="#">

                                                                    <img src="{{ App\Models\Gallery::where('product_id', $item->product_id)->first()->src }}"
                                                                        alt="{{ App\Models\Product::where('id', $item->product_id)->first()->title }}">
                                                                </a>
                                                                <a href="#">
                                                                    <span class="titleCart">
                                                                        {{ App\Models\Product::where('id', $item->product_id)->first()->title }}
                                                                    </span>
                                                                    <div class="quantityCart">
                                                                        1 ×
                                                                        <span
                                                                            class="price">{{ number_format(App\Models\Product::where('id', $item->product_id)->first()->final_price) }}
                                                                            <span class="amount">تومان</span>
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </span>

                                                            <form
                                                                action="{{ route('cart.remove', $item->product_id) }}"
                                                                method="POST"> @csrf
                                                                <button class="cart_remove"><i
                                                                        class="fal fa-times"></i></button>
                                                            </form>
                                                        </li>
                                                        @php
                                                            $sum += App\Models\Product::where('id', $item->product_id)->first()->final_price;
                                                        @endphp
                                                    @endforeach




                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offcanvas-footer">
                                <div class="mini-cart-total total">
                                    <strong>جمع كل سبد خريد:</strong>
                                    <span class="price fl">{{ number_format($sum) }}
                                        <span class="amount">تومان</span>
                                    </span>
                                </div>
                                <div class="mini-cart-actions">
                                    <a href="{{ route('cart') }}" class="forward">مشاهده سبد خرید</a>
                                </div>
                            </div>
                        </div>
                    </nav>

                    <div class="offcanvas-overlay"></div>
                </div>
            </div>
        </div>
        <div class="bottom-page-header">
            <div class="container">
                <div class="page-header">
                    <div class="d-flex align-items-center">
                        <!-- logo -->
                        <div class="logo">
                            <a href="/">
                                <img src="/assets/images/logo.png" class="img-fluid" alt="logo">
                            </a>
                        </div>
                        <!-- search -->
                        <div class="search-box">
                            <form action="{{ route('shop') }}">
                                <input type="search" name="search" id="search-form-text" class="search-field"
                                    placeholder="کلید واژه مورد نظر ...">
                                <button><i class="fal fa-search"></i></button>

                            </form>

                        </div>
                    </div>
                    <div class="call-number">
                        <div class="call-number-item">
                            <strong>1319097</strong>
                            <span>0922</span>
                            <i class="fal fa-phone"></i>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="menuMain">
                <div class="container">
                    <ul>
                        <li class="level-0 menuItem">
                            <a href="/">
                                <i class="fal  fa-home"></i> خانه
                            </a>
                        </li>



                        <li class="level-0 menuItem">
                            <a href="{{ route('home.articles') }}">
                                مقالات
                            </a>
                        </li>
                        <li class="level-0 menuItem">
                            <a href="{{ route('shop') }}">
                                فروشگاه
                            </a>
                        </li>

                        <li class="level-0 menuItem">
                            <a href="/contact">
                                تماس باما
                            </a>
                        </li>

                        <li class="level-0 menuItem">
                            <a href="/about">
                                درباره ما
                            </a>
                        </li>

                        <li class="level-0 menuItem">
                            <a href="/questions">
                                سوالات متداول
                            </a>
                        </li>



                        <li class="level-0 menuItem">
                            <a href="#" class="iconUnderMenu">
                                دسته بندی محصولات
                            </a>
                            <ul class="sub-menu">
                                @foreach (App\Models\Category::orderBy('id', 'DESC')->get() as $item)
                                    <li class="level-1 menuItem">
                                        <a href="{{ route('shop', ['category' => $item->id]) }}">
                                            {{ $item->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
            <!-- responsiveMenu -->
            <nav class="sidebar">
                <div class="nav-header">
                    <div class="header-cover"></div>
                    <div class="logo-wrap">
                        <a class="logo-icon" href="#">
                            <img alt="logo-icon" src="/assets/images/logo.png" width="40">
                        </a>
                    </div>
                </div>

                <ul class="nav-categories ul-base">
                    <li><a href="/">خانه</a> </li>
                    <li>
                        <a href="{{ route('home.articles') }}">
                            مقالات
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('shop') }}">
                            فروشگاه
                        </a>
                    </li>

                    <li>
                        <a href="/contact">
                            تماس باما
                        </a>
                    </li>

                    <li>
                        <a href="/about">
                            درباره ما
                        </a>
                    </li>
                    <li>
                        <a href="/questions">
                            سوالات متداول
                        </a>
                    </li>

                    <li>
                        <a href="#" data-toggle="collapse" data-target="#headingSix" aria-expanded="false"
                            aria-controls="headingSix">
                            دسته بندی محصـولات
                            <i class="fal fa-angle-left"></i>
                        </a>
                        <div class="collapse" id="headingSix">
                            <ul>
                                @foreach (App\Models\Category::orderBy('id', 'DESC')->get() as $item)
                                    <li class="has-sub"><a href="{{ route('shop', ['category' => $item->id]) }}">
                                            {{ $item->title }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="nav-btn nav-slider">
                <span class="linee1"></span>
                <span class="linee2"></span>
                <span class="linee3"></span>
            </div>
            <div class="overlay"></div>
        </div>
        <div class="sticky-toolbar-footer">
            <svg xmlns="http://www.w3.org/2000/svg" width="82" height="50" viewBox="0 0 82 50">
                <path
                    d="M0,50V45H82v5H0ZM0,0.025C0.167,0.017.331,0,.5,0A9.494,9.494,0,0,1,9.87,8h0.138A32.013,32.013,0,0,0,41,32,32.013,32.013,0,0,0,71.992,8H72.13A9.494,9.494,0,0,1,81.5,0c0.169,0,.333.017,0.5,0.025V45H0V0.025Z">
                </path>
            </svg>
            <div class="toolbar-mobile">
                <div class="toolbar-col scroll-sticky">
                    <div class="toolbar-item">
                        <i class="fal fa-arrow-up"></i>
                    </div>
                </div>

                <div class="toolbar-col cart">
                    <a href="/cart" class="toolbar-item">
                        <i class="fal fa-shopping-bag"></i>
                        <span
                            class="count-cart">{{ count(App\Models\Cart::where('user_id', Auth::id())->get()) }}</span>
                    </a>
                </div>
                <div class="toolbar-col product">
                    <a href="/shop" class="toolbar-item">
                        <i class="fal fa-store"></i>
                    </a>
                </div>

            </div>
        </div>
    </header>
    <div class="overlay-search-box"></div>
    <!-- header -->
    <!-- content -->
    @yield('content')
    <!-- content -->
    <!-- footer -->
    <footer class="main-footer">
        <div class="footer-wrap">
            <div class="footer-top-svg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1351 48">
                    <path
                        d="M0,8s101.773,23.5,357,3C479.634,1.15,645.1.159,789.994,16.234,924.514,31.158,1042.19,12.008,1084,8c156.39-14.994,267,0,267,0V50H0V8Z">
                    </path>
                </svg>
            </div>
            <div class="boxed-service">
                <div class="col-md-3 col-sm-6 col-xs-12 mb-4">
                    <div class="service-item">
                        <div class="service-icon">
                            <img src="/assets/images/pageProduct/service/price-tag-1.png" alt="service">
                        </div>
                        <div class="service-content">
                            <h4>تضمین بهترین قیمت</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 mb-4">
                    <div class="service-item">
                        <div class="service-icon">
                            <img src="/assets/images/pageProduct/service/shield-1.png" alt="service">
                        </div>
                        <div class="service-content">
                            <h4>ضمانت اصل بودن</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 mb-4">
                    <div class="service-item">
                        <div class="service-icon">
                            <img src="/assets/images/pageProduct/service/delivery-truck-3.png" alt="service">
                        </div>
                        <div class="service-content">
                            <h4>ارسال به تمام ایران </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 mb-4">
                    <div class="service-item">
                        <div class="service-icon">
                            <img src="/assets/images/pageProduct/service/gift-2.png" alt="service">
                        </div>
                        <div class="service-content">
                            <h4>بسته بندی زیبا</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-gap-default container">
                <div class="col-md-4 pr-md-5 col-sm-6 col-xs-6 fr ">
                    <div class="footer-list">
                        <div class="title-list">دسترسی آسـان</div>
                        <ul>
                            <li class="list-item">
                                <a href="/">صفحه اصلی</a>
                            </li>
                            <li class="list-item">
                                <a href="/articles">مقالات</a>
                            </li>
                            <li class="list-item">
                                <a href="/shop">فروشگاه</a>
                            </li>
                            <li class="list-item">
                                <a href="/shop">درباره ما</a>
                            </li>
                            <li class="list-item">
                                <a href="#">تماس با ما</a>
                            </li>

                        </ul>
                    </div>
                </div>


                <div class="col-md-4 col-sm-6 col-xs-6 fr">
                    <div class="footer-list">
                        <div class="contact-us">
                            <h5>پل های ارتباطی</h5>
                            <ul>
                                <li class="contact-item">
                                    <i class="fal fa-map-marked-alt"></i>
                                    <span> ایران - تهران - بازار مبل یافت اباد</span>
                                </li>
                                <li class="contact-item phone">
                                    <i class="fal fa-phone-volume"></i>
                                    <strong>1319097</strong>
                                    <span>0922</span>
                                </li>
                            </ul>
                        </div>
                        <div class="contact-social">
                            <ul>

                                <li class="social-item">
                                    <a href="https://www.instagram.com/lamschoob/" target="_blank"><i
                                            class="fab fa-instagram"></i></a>
                                </li>
                                <li class="social-item">
                                    <a href="https://t.me/LAMSCHOOB" target="_blank"><i
                                            class="fab fa-telegram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-sm-12 col-xs-6 fr">
                    <div class="license">
                        <div class="license-images">
                            <ul>
                                <li class="license-item">
                                    <img src="/assets/images/license/L-1.png" alt="license">
                                </li>
                                <li class="license-item pl-4">
                                    <script src="https://static.idpay.ir/trust.js?id=01GY0Z0GC0YWWC2F9P8K0KMT6Y&width=64"></script>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="widget-text-editor">
                    <div class="col-12">

                        <div class="copy-right">
                            <p>تمامی حقوق این وب سایت برای "لمس چوب" محفوط می باشد . 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->
    <!-- scrolltop -->
    <div class="sticky-toolbox">
        <ul>

            <li>
                <a href="{{ route('cart') }}" class="cart-sticky" title="سبد خرید">
                    <i class="fal fa-shopping-bag"></i>
                    @auth
                        <span>{{ count(App\Models\Cart::where('user_id', Auth::id())->get()) }}</span>
                    @endauth
                </a>
            </li>
            <li>
                <a href="#" class="scroll-sticky" title="رفتن به بالا">
                    <i class="fal fa-arrow-up"></i>
                </a>
            </li>
        </ul>
    </div>
</body>


<script src="/assets/js/plugins/jquery-3.6.0.min.js"></script>
<script src="/assets/js/plugins/popper.min.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script src="/assets/js/plugins/jquery.nice-select.min.js"></script>
<script src="/assets/js/plugins/swiper-bundle.min.js"></script>
<script src="/assets/js/plugins/countdown.min.js"></script>
<script src="/assets/js/plugins/jquery.countdown.min.js"></script>
<script src="/assets/js/plugins/theia-sticky-sidebar.min.js"></script>
<script src="/assets/js/plugins/nouislider.min.js"></script>
<script src="/assets/js/plugins/wNumb.js"></script>
<script src="/assets/js/plugins/lightzoom.min.js"></script>
<script src="/assets/js/plugins/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/plugins/bootstrap-slider.min.js"></script>
<script src="/assets/js/plugins/apexcharts.min.js"></script>
<script src="/assets/js/plugins/zoomple.js"></script>
<script src="/assets/js/plugins/jquery.ez-plus.js"></script>
<!-- JS Template -->
<script src="/assets/js/main.js"></script>
@if (session('success'))
    <script>
        Swal.fire({
            title: "موفقیت",
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: ' باشه ',
            timer: 3000,
            timerProgressBar: true,
        })
    </script>
@endif
@if (session('error'))
    <script>
        Swal.fire({
            title: "خطا",
            text: "{{ session('error') }}",
            icon: 'error',
            confirmButtonText: ' باشه ',
            timer: 3000,
            timerProgressBar: true,
        })
    </script>
@endif
@if (session('info'))
    <script>
        Swal.fire({
            text: "{{ session('info') }} ",
            icon: 'info',
            confirmButtonText: ' باشه ',
            timer: 3000,
            timerProgressBar: true,
        })
    </script>
@endif

</html>
