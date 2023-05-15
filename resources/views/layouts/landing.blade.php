<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>به وب سایت ما خوش آمدید</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/public.css">

</head>
<body>

    <div class="container py-4">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link @unless(currentLandingPage()) active  @endunless" href="{{ url('') }}">صفحه اصلی</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(currentLandingPage() == 'products') active @endif" href="{{ route('landing' , 'products') }}">محصولات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(currentLandingPage() == 'shops') active @endif" href="{{ route('landing' , 'shops') }}">فروشگاه ها</a>
            </li>
            <li class="nav-item">
                <a class="cart nav-link @if(currentLandingPage() == 'cart') active @endif" href="{{ route('landing' , 'cart') }}"> 
                    سبد خرید
                    <span> 0 </span>
                </a>
            </li>
            <li class="auth nav-item align-self-center">
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                    حساب کاربری
                </a>
            </li>
        </ul>

        <div class="card mt-4">
            <div class="card-body">
                @if ($error = session('error'))
                    <div class="alert alert-danger">
                         {{$error}}
                    </div>
                 @endif

                 @if ($message = session('message'))
                 <div class="alert alert-success">
                      {{$message}}
                 </div>
              @endif

                @yield('content')
            </div>
        </div>
    </div>

    

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/js/public.js"></script>
</body>
</html>