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
                <a class="nav-link " href="{{ url('/') }}">صفحه اصلی</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing' , 'products') }}">محصولات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('landing' , 'shops') }}">فروشگاه ها</a>
            </li>
        </ul>

        <div class="card mt-4">
            <div class="card-body">
                <h4> فروشگاه ها</h4>
                <hr>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/js/public.js"></script>
</body>
</html>