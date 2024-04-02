<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <div class="container" style="padding-bottom: 120px">
        <div class="menu-con">
            <div style="display: flex; gap: 20px; align-items: center">
                <a href="/" style="cursor: pointer">
                    <i style="font-size: 24px" class="fa-solid fa-arrow-left"></i>
                </a>
                <p class="menu-fea">All Products</p>
            </div>
        </div>
        <div class="prod-dis">
            @foreach ($products as $p)
                @include('components.products',['p'=>$p])
            @endforeach
        </div>
    </div>
</body>
</html>