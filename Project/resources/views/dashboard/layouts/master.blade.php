<!doctype html>
<html lang="en" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="https://filenter.ir/Syn/demo/horizontal/assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="/assets/dashboard/css/simplebar.css" rel="stylesheet" />
    <link href="/assets/dashboard/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="/assets/dashboard/css/highcharts.css" rel="stylesheet" />
    <link href="/assets/dashboard/css/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="/assets/dashboard/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="/assets/dashboard/css/pace.min.css" rel="stylesheet" />
    <script src="/assets/dashboard/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="/assets/dashboard/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/dashboard/css/bootstrap-extended.css" rel="stylesheet">
    <link href="/assets/dashboard/css/app.css" rel="stylesheet">
    <link href="/assets/dashboard/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="/assets/dashboard/css/dark-theme.css" />
    <link rel="stylesheet" href="/assets/dashboard/css/semi-dark.css" />
    <link rel="stylesheet" href="/assets/dashboard/css/header-colors.css" />
 
    <title>داشبورد مدیریت : {{ Auth::user()->name }}</title>
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="/assets/dashboard/js/ckeditor/ckeditor.js"></script>

</head>

<body class="rtl">
    <!--wrapper-->
    <div class="wrapper">
        <!--start header wrapper-->
        <div class="header-wrapper">
            <!--start header -->
            <header>
                <div class="topbar d-flex align-items-center">
                    <nav class="navbar navbar-expand">
                        <div class="topbar-logo-header">
                            <div class="">
                                <img src="https://filenter.ir/Syn/demo/horizontal/assets/images/logo-icon.png"
                                    class="logo-icon" alt="logo icon">
                            </div>
                            <div class="">
                                <h4 class="logo-text">داشبورد مدیریت</h4>
                            </div>
                        </div>
                        <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>

                        <div class="top-menu ms-auto">
                            <ul class="navbar-nav align-items-center">

                                <li class="nav-item dropdown dropdown-large">
                                    <form action="{{ route('logout') }}"
                                        method="POST" id="dlogout_form"> @csrf </form>
                                    <a  onclick="event.preventDefault();document.getElementById('dlogout_form').submit()" class="nav-link position-relative" target="_blank" href="/" role="button">
                                        <i class='bx bx-power-off'></i>
                                    </a>

                                </li>
                                <li class="nav-item dropdown dropdown-large">
                                    <a class="nav-link position-relative" target="_blank" href="/" role="button">
                                        <i class='bx bx-home'></i>
                                    </a>

                                </li>
                                <li class="nav-item   dropdown-large">
                                    <a class="nav-link  position-relative"
                                        href="{{route('contact')}}" >
                                        <span class="alert-count">{{ count(App\Models\Contact::where('seen','new')->get()) }}</span>
                                        <i class='bx bx-comment'></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:;">
                                            <div class="msg-header">
                                                <p class="msg-header-title">اعلان ها</p>
                                                <p class="msg-header-clear ms-auto">علامت گذاری همه به عنوان خوانده شده
                                                </p>
                                            </div>
                                        </a>
                                        <div class="header-notifications-list">
                                           
                                        
                                        </div>
                                        
                                    </div>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link   position-relative"
                                        href="{{route('orders.pending')}}" > <span class="alert-count">{{ count(App\Models\Order::where('status', 'pending')->get()) }}</span>
                                        <i class='bx bx-bell'></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:;">
                                            <div class="msg-header">
                                                <p class="msg-header-title">پیغام ها</p>
                                                <p class="msg-header-clear ms-auto">علامت گذاری همه به عنوان خوانده شده
                                                </p>
                                            </div>
                                        </a>
                                        <div class="header-message-list">
                                             
                                          
                                        </div>
                                        
                                    </div>
                                </li>




                            </ul>
                        </div>
                        <div class="user-box dropdown">
                            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/assets/dashboard/images/avatar.jpg" class="user-img" alt="user avatar">
                                <div class="user-info ps-3">
                                    <p class="user-name mb-0"> {{ Auth::user()->name }} </p>
                                    <p class="designattion mb-0">
                                        {{ App\Models\Role::where('id', Auth::user()->role_id)->first()->label }} </p>
                                </div>
                            </a>
                             
                        </div>
                    </nav>
                </div>
            </header>
            <!--end header -->
            <!--navigation-->
            <div class="nav-container">
                <div class="mobile-topbar-header">
                    <div>
                        <img src="https://filenter.ir/Syn/demo/horizontal/assets/images/logo-icon.png"
                            class="logo-icon" alt="logo icon">
                    </div>
                    <div>
                        <h4 class="logo-text">داشبورد </h4>
                    </div>
                    <div class="toggle-icon ms-auto"><i class='bx bx-last-page'></i>
                    </div>
                </div>
                <nav class="topbar-nav">
                    <ul class="metismenu" id="menu">
                      
                        <li>
                            <a href="{{ route('dashboard.panel') }}">
                                <div class="menu-title">خانه</div>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:;" class="has-arrow">
                                <div class="menu-title">  پوستر </div>
                            </a>
                            <ul>
                                <li> <a href="{{ route('sliders') }}"><i class="bx bx-left-arrow-alt"></i>مدیریت
                                        اسلایدر</a></li>
                                <li> <a href="{{ route('banners') }}"><i class="bx bx-left-arrow-alt"></i>مدیریت
                                        بنر</a></li>
                            </ul>
                        </li>


                        <li>
                            <a href="javascript:;" class="has-arrow">
                                <div class="menu-title"> محصولات </div>
                            </a>
                            <ul>
                                <li> <a href="{{ route('categories') }}"><i class="bx bx-left-arrow-alt"></i>دسته بندی
                                        محصولات</a></li>

                                <li> <a href="{{ route('products') }}"><i class="bx bx-left-arrow-alt"></i>مدیریت
                                        محصولات</a></li>
                                <li> <a href="{{ route('products.new') }}"><i class="bx bx-plus"></i>محصول جدید </a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="javascript:;" class="has-arrow">
                                <div class="menu-title"> سفارشات <span
                                    class="badge bg-success text-white">{{ count(App\Models\Order::where('status', 'pending')->get()) }}</span></div>
                            </a>
                            <ul>
                                <li> <a href="{{ route('orders.pending') }}"> <i class="bx bx-left-arrow-alt"></i>    جدید <span
                                    class="badge bg-dark text-white">{{ count(App\Models\Order::where('status', 'pending')->get()) }}</span></a></li>
                                <li> <a href="{{ route('orders.completing') }}"> <i class="bx bx-left-arrow-alt"></i>  درحال تکمیل <span
                                    class="badge bg-dark text-white">{{ count(App\Models\Order::where('status', 'completing')->get()) }}</span></a></li>
                                <li> <a href="{{ route('orders.delivered') }}"> <i class="bx bx-left-arrow-alt"></i>  تحویل شده  <span
                                    class="badge bg-dark text-white">{{ count(App\Models\Order::where('status', 'delivered')->get()) }}</span></a></li>
 

                            </ul>
                        </li>


                        <li>
                            <a href="javascript:;" class="has-arrow">
                                <div class="menu-title"> تخفیفات </div>
                            </a>
                            <ul>
                                <li> <a href="{{ route('discounts') }}"><i class="bx bx-left-arrow-alt"></i> کد
                                        تخفیف</a></li>

                            </ul>
                        </li>



                        <li>

                            @if (count(App\Models\Comment::where('active', '0')->get()) > 0)
                                <a href="{{ route('comments') }}">
                                    <div class="menu-title">نظرات <span
                                            class="badge bg-danger text-white">{{ count(App\Models\Comment::where('active', '0')->get()) }}</span>
                                    </div>
                                </a>
                            @else
                                <a href="{{ route('comments') }}">
                                    <div class="menu-title">نظرات </div>
                                </a>
                            @endif

                        </li>

                        <li>
                            <a href="javascript:;" class="has-arrow">
                                <div class="menu-title"> مقالات </div>
                            </a>
                            <ul>
                                <li> <a href="{{ route('articles.new') }}"><i class="bx bx-left-arrow-alt"></i> مقاله جدید</a></li>
                                <li> <a href="{{ route('articles') }}"><i class="bx bx-left-arrow-alt"></i> مدیریت مقالات  </a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="has-arrow">
                                <div class="menu-title"> تنظیمات </div>
                            </a>
                            <ul>
                                <li> <a href="{{ route('setting.offers') }}"><i class="bx bx-left-arrow-alt"></i> بخش پیشنهادات  </a></li>
                                <li> <a href="{{ route('setting.favorites') }}"><i class="bx bx-left-arrow-alt"></i> بخش محبوب ها  </a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="{{route('users')}}" >
                                <div class="menu-title"> کاربران <span
                                    class="badge bg-info text-white">{{ count(App\Models\User::all()) }}</span></div>
                            </a>
                        </li>


                        <li>
                            <a href="{{route('contact')}}" >
                                <div class="menu-title"> پیام ها <span
                                    class="badge bg-warning text-black">{{ count(App\Models\Contact::where('seen','new')->get()) }}</span></div>
                            </a>
                        </li>


                        <li>
                            <a href="{{route('questions')}}" >
                                <div class="menu-title"> سوالات   </div>
                            </a>
                        </li>


                    </ul>
                </nav>
            </div>
            <!--end navigation-->
        </div>
        <!--end header wrapper-->
        <!--start page wrapper -->
        @yield('content')
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">کپی رایت © 2023. تمامی حقوق محفوظ است.</p>
        </footer>
    </div>


    <script src="/assets/dashboard/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="/assets/dashboard/js/jquery.min.js"></script>
    <script src="/assets/dashboard/js/simplebar.min.js"></script>
    <script src="/assets/dashboard/js/metisMenu.min.js"></script>
    <script src="/assets/dashboard/js/perfect-scrollbar.js"></script>
    <script src="/assets/dashboard/js/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/assets/dashboard/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/assets/dashboard/js/highcharts.js"></script>
    <script src="/assets/dashboard/js/exporting.js"></script>
    <script src="/assets/dashboard/js/variable-pie.js"></script>
    <script src="/assets/dashboard/js/export-data.js"></script>
    <script src="/assets/dashboard/js/accessibility.js"></script>
    <script src="/assets/dashboard/js/apexcharts.min.js"></script>
    <script src="/assets/dashboard/js/index2.js"></script>
    <!--app JS-->
    <script src="/assets/dashboard/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
    <script>
        new PerfectScrollbar('.customers-list');
        new PerfectScrollbar('.store-metrics');
        new PerfectScrollbar('.product-list');
    </script>

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
 
</body>

</html>
