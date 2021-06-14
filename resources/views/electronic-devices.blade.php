<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Electronic Devices</title>
        <style>
            .container {
                max-width: 992px;
                width: 100%;
                margin: 0 auto;
                padding: 10px;
            }
            .product {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            img {
                height: 280px;
                width: 300px;
                object-fit: contain;
                margin: 0 5px;
                border-radius: 5px;
            }
            .cart-btn {
                height: 50px;
                width: 150px;
                background-color: rgb(82, 231, 82);
                border: none;
                border-radius: 5px;
                cursor: pointer;
                color: white;
            }
            .cart-btn:hover {
                background-color: rgba(10, 131, 10, 0.637);
                transition: all 0.4s;
            }
            hr {
                width: 100%;
            }
        </style>
    </head>
    <body>
        <h3>Here are the list of electronic products you can buy:</h3>
        <div class="container">
            @foreach ($products as $product)
            <div class="product">
                <img
                    src="{{ $product->image_path }}"
                />
                <h4>{{ $product->product_name }}</h4>
                <form method="POST">
                    <button class="cart-btn" type="submit">Add to cart</button>
                </form>
                <hr />
            </div>
            @endforeach
        </div>
    </body>
</html>
