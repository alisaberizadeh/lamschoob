
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حساب کاربری</title>
    <!-- fontAwesome -->
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="/assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/noUISlider.min.css">
    <!-- mainStyle -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
</head>

<body>
    <!-- content -->
    <main class="content mt-0">
        <div class="container">
            <div class="row">
                <nav class="sidebar">
                    <div class="woocommerce-MyAccount-navigation">
                        <div class="my-account-info">
                            <a href="#" class="gravatar">
                                <img src="/uploads/avatars/1.png" alt="avatar" class="img-fluid avatar">
                            </a>
                            <span class="username"> {{Auth::user()->name}}  </span>
                            <span class="username"> کد معرف شما : {{Auth::user()->mycode}}  </span>
                        </div>
                        <div class="my-account-menu">
                            <div class="item-menu">
                                <a href="/shop">
                                    <i class="fal fa-store"></i>
                                    فروشگاه
                                </a>
                            </div>
                            <div class="item-menu">
                                <a href="/cart">
                                    <i class="fal fa-shopping-bag"></i>
                                    سبد خرید من
                                </a>
                            </div>
                        </div>
                        <ul>
                            <li class="MyAccount-navigation-link MyAccount-navigation-link-dashboard ">
                                <a href="{{route('user.panel')}}">
                                    <i class="fal fa-user"></i>
                                    اطلاعات حساب کاربری
                                </a>
                            </li>
                            <li class="MyAccount-navigation-link MyAccount-navigation-link-dashboard ">
                                <a href="{{route('user.orders')}}">
                                    <i class="fal fa-shopping-basket"></i>
                                    سفارشات من
                                </a>
                            </li>
     
                            <li class="MyAccount-navigation-link MyAccount-navigation-link-dashboard ">
                                <a href="{{route('user.discounts')}}">
                                    <i class="fal fa-bell"></i>
                                    کد های تخفیف  <span class="badge bg-danger text-white">{{count(App\Models\DiscountCode::where("user_id" , Auth::id())->get())}}</span>
                                </a>
                            </li>
                       
                        </ul>
                    </div>
                </nav>
                <div class="nav-btn nav-slider nav-profile">
                    <span class="linee1"></span>
                    <span class="linee2"></span>
                    <span class="linee3"></span>
                </div>
                <div class="overlay"></div>
                <div class="col-lg-3">
                    <nav class="woocommerce-MyAccount-navigation MyAccount-navigation-none">
                        <div class="my-account-info">
                            <a href="#" class="gravatar">
                                <img src="/uploads/avatars/1.png" alt="avatar" class="img-fluid avatar">
                            </a>
                            <span class="username"> {{Auth::user()->name}}  </span>
                            <span class="username"> کد معرف شما : {{Auth::user()->mycode}}  </span>
                        </div>
                        <div class="my-account-menu">
                            <div class="item-menu">
                                <a href="/shop">
                                    <i class="fal fa-store"></i>
                                    فروشگاه
                                </a>
                            </div>
                            <div class="item-menu">
                                <a href="/cart">
                                    <i class="fal fa-shopping-bag"></i>
                                    سبد خرید من
                                </a>
                            </div>
                        </div>
                        <ul>
                            <li class="MyAccount-navigation-link MyAccount-navigation-link-dashboard ">
                                <a href="{{route('user.panel')}}">
                                    <i class="fal fa-user"></i>
                                    اطلاعات حساب کاربری
                                </a>
                            </li>
                            <li class="MyAccount-navigation-link MyAccount-navigation-link-dashboard ">
                                <a href="{{route('user.orders')}}">
                                    <i class="fal fa-shopping-basket"></i>
                                    سفارشات من
                                </a>
                            </li>
     
                            <li class="MyAccount-navigation-link MyAccount-navigation-link-dashboard ">
                                <a href="{{route('user.discounts')}}">
                                    <i class="fal fa-bell"></i>
                                    کد های تخفیف  <span class="badge bg-danger text-white">{{count(App\Models\DiscountCode::where("user_id" , Auth::id())->get())}}</span>
                                </a>
                            </li>
                       
     
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-9 col-xs-12">
                    <div class="woocommerce-MyAccount-content">
                        <header class="user-header">
                            <div class="account-head-icon">
                                <ul>
                                    <li>
                                        <form action="{{ route('logout') }}"
                                        method="POST" id="dlogout_form"> @csrf </form>
                                        <a href="/logout" class="logout"  onclick="event.preventDefault();document.getElementById('dlogout_form').submit()" >
                                            <i class="fal fa-power-off"></i>
                                        </a>
                                    </li>
                                   
                                
                                    <li>
                                        <a href="/" class="home">
                                            <i class="fal fa-house-flood"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </header>
                       
                            
                            @yield('content')
                     </div>
                </div>
            </div>
        </div>
    </main>
    <!-- content -->
 
</body>

<!-- JS Global Compulsory -->
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
<!-- JS Template -->
<script src="/assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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

</html>