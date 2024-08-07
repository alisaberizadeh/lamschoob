 
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بازیابی کلمه عبور </title>
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
                                <img src="/assets/images/logo.png" alt="فروشگاه اینترنتی ویرا" class="img-fluid">
                            </a>
                        </section>


                        <div class="title">   کلمه عبور جدید   </div>

                        <div class="login-wrap mt-2">

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="d-block border-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{route('password.update')}}" method="POST"> @csrf
                                <div class="item-account username">
                                    <input  name="email" type="email"  value="{{ $email ?? old('email') }}" required autocomplete="email" >
                                </div>
                        <input type="hidden" name="token" value="{{ $token }}">
                                
                                <div class="item-account password">
                                    <input  name="password" type="password" placeholder="کلمه عبور جدید" required>
                                </div>
                                
                                <div class="item-account password">
                                    <input  name="password_confirmation"   placeholder="تکرار کلمه عبور  " type="password" required>
                                </div>
                                
                                <div class="action-account">
                                    <button type="submit" class="loginBtn">   بازیابی </button>
                                  
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
<!-- JS Global Compulsory -->
<script src="assets/js/plugins/jquery-3.6.0.min.js"></script>
<script src="assets/js/plugins/popper.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script src="assets/js/plugins/jquery.nice-select.min.js"></script>
<script src="assets/js/plugins/swiper-bundle.min.js"></script>
<script src="assets/js/plugins/countdown.min.js"></script>
<script src="assets/js/plugins/jquery.countdown.min.js"></script>
<script src="assets/js/plugins/theia-sticky-sidebar.min.js"></script>
<script src="assets/js/plugins/nouislider.min.js"></script>
<script src="assets/js/plugins/wNumb.js"></script>
<!-- JS Template -->
<script src="assets/js/main.js"></script>
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
