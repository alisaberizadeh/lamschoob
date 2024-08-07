<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فروشگاه اینترنتی لمس چوب</title>
 
</head>

<body>
    <div style="width: 100%;text-align: center">
        <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
        <div
            style="padding: 1rem;background: rgba(238, 238, 238, 0.47);border-radius: 10px;direction: rtl;text-align: right;margin: 1rem 0;">
            <h3 style="margin-top: 1rem;">سلام {{ $name }} !!!</h3>
            <h4 style="font-family:IRANSans ">فروشگاه اینترنتی "لمس چوب" برای شما به مناسبت تولدتان یک کد تخفیف در نظر گرفته است</h4>
            <h4 style="color: red;font-weight: bold">کد تخفیف :
                <span
                    style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                    {{ $discount }}</span>
            </h4>
            <h4> زادروزتان مبارک </h4>
            <br><br><br><br>
            <h5>
                <span
                    style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">{{ $date }}</span>
            </h5>

            <h4 style="text-align: center">
                <a href="www.lamschoob.com"
                    style="color: rgb(0, 106, 255);font-weight: bold;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;text-align: center">www.lamschoob.com</a>
            </h4>
        </div>
    </div>
</body>

</html>
