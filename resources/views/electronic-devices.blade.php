<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Electronic Devices</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            .container {
                max-width: 992px;
                width: 100%;
                margin: 0 auto;
                padding: 10px;
                text-align: center;
            }
            img{
                height: 250px;
                width: 300px;
                object-fit: contain;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h3>Here are the list of electronic products you can buy:</h3>
            @foreach ($products as $product)
            <div class="product">
                <img
                    src="{{ asset('images/'. $product->image_path ) }}"
                />
                <h4 class="product-name text-uppercase">Name: {{ $product->product_name }}</h4>
                <h4 class="product-price">Price: {{ $product->price }}</h4>
                {{-- route(name,id) --}}
                <form method="GET" action="{{ route('add-to-cart',$product->id) }}">
                    @csrf
                    <button class="btn btn-success" type="submit">Add to cart</button>
                </form>
                <hr />
            </div>
            @endforeach
        </div>
    </body>
</html>
