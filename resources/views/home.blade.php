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
    <div class="container" id="contain" style="padding-bottom: 120px">
        @include('components.menu',['text' => 'Featured Categories'])
        <div class="cat-dis">
            @foreach ($categories as $p)
                    @include('components.category')
            @endforeach
        </div>
        <div class="pro-dis">
            @foreach ($promotions[0] as $p)
                @include('components.promotion')
            @endforeach
        </div>
        @include('components.menu', ['text' => 'Popular Products'])
        {{-- @include('components.form') --}}
        <div class="prod-dis">
            @foreach ($products as $p)
                @include('components.products')
            @endforeach
        </div>
        <div​​ style="display: flex; gap: 20px">
            <a href="/products/add">
                <button style="align-content: center; align-self: start; padding: 5px 10px; background-color: royalblue; color: white; cursor: pointer;">Insert Data</button>
            </a>
            <a href="/products/edit">
                <button style="align-content: center; align-self: start; padding: 5px 10px; background-color: royalblue; color: white; cursor: pointer;">Edit Data</button>
            </a>
        </div>
    </div>
</body>
</html>