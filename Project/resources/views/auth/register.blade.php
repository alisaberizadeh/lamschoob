<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عضویت</title>
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
    <main class="content mt-3">
        <div class="container">
            <div class="my-account-login">
                <div class="col-lg-4 col-md-5 mx-auto">
                    <div class="account-box">
                        <section class="account-login-logo">
                            <a href="/">
                                <img src="/assets/images/logo.png" alt="فروشگاه اینترنتی لمس چوب" class="img-fluid">
                            </a>
                        </section>
                        <ul class="py-3">
                            <li>
                                <a href="{{ route('login') }}">
                                    <i class="fal fa-user"></i>
                                    ورود
                                </a>
                            </li>
                            <li class="active">
                                <a href="{{ route('register') }}">
                                    <i class="fal fa-user-plus"></i>
                                    عضویت
                                </a>
                            </li>
                        </ul>
                        <div class="title">ایجاد حساب کاربری</div>

                        <div class="login-wrap mt-2">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="d-block border-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="" method="post">@csrf
                                <div class="item-account name">
                                    <input type="text" value="{{ old('name') }}" name="name" id="name-user"
                                        placeholder="نام و نام خانوادگی" required="">
                                </div>
                                <div class="item-account mobile">
                                    <input type="text" name="mobile" value="{{ old('mobile') }}" id="phone-number"
                                        placeholder="شماره تلفن همراه " maxlength="11" required="">
                                </div>
                                <div class="item-account ">
                                    <input type="text" name="birth" value="{{ old('birth') }}" 
                                        placeholder="تاریخ تولد : 12 ابان 1398" required="">
                                </div>
                                <div class="item-account username">
                                    <input id="email-user" value="{{ old('email') }}" name="email" type="email"
                                        placeholder="ایمیل" required="">
                                </div>
                                <div class="item-account password">
                                    <input id="password-user value="{{ old('password') }}" " name="password" type="password" placeholder="گذرواژه" required="">
                                </div>
                                
                                <div class="item-account password">
                                    <input id="password-user" value="{{ old('password_confirmation') }}"  name="password_confirmation" type="password" placeholder="تکرار گذرواژه" required="">
                                    <p class="help-block">حداقل 8 کاراکتر</p>
                                </div>
                                <p class="help-block fw-bold text-primary" data-toggle="collapse" data-target="#demo">کد معرف دارید ؟!</p>

                                <div id="demo" class="collapse mb-3">
                                    <div class="item-account">
                                        <input type="text" value="{{ old('mycode') }}" name="mycode"
                                        placeholder=" کد معرف را وارد کنید  ">                                    </div>
                                </div>
                                <div class="action-account">
                                    <button type="submit" class="registerBtn">عضویت</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- content -->
    <!-- scrolltop -->
  
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
