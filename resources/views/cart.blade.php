<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Ecommerce</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <style>
            .image {
                height: 200px;
                width: 200px;
            }
            .box-shadow {
                box-shadow: 5px 5px 10px #000;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid my-5">
            <div class="row">

                <div class="col-sm-5">
                    <div class="container mb-4 box-shadow">
                        <div class="row">
                            <div class="col-sm-4">
                                <img
                                    class="image"
                                    src="https://i.gadgets360cdn.com/products/large/1548680882_635_samsung_galaxy_m10.jpg"
                                />
                            </div>
                            <div class="col-sm-8">
                                <h4>Samsung</h4>
                                <p>Price: 20k</p>
                                <button class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-5">
                    <div class="container box-shadow p-4">
                        <h3>The total amount of:</h3>
                        <h4>Amount: 20k</h4>
                        <h4>VAT: 200</h4>
                        <hr />
                        <h3>Total after VAT: 19.8k</h3>
                        <button type="submit" class="btn btn-success">
                            Confirm Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
