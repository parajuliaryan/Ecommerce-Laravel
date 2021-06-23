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
                object-fit: contain;
            }
            .box-shadow {
                box-shadow: 5px 5px 10px #000;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid my-5">
            <div class="row">
              @if (session('cart'))
              @foreach (session('cart') as $id => $details)
                <div class="col-sm-5">
                    <div class="container mb-4 box-shadow">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img
                                            class="image"
                                            src="{{ asset('images/'. $details['image_path']) }}"
                                        />
                                    </div>
                                        <div class="col-sm-8">
                                            <h4>Name: {{ $details['product_name'] }}</h4>
                                            <p>Price: <span class="itemPrice">{{ $details['price'] }}</span></p>
                                            <form action = {{ route('remove-from-cart') }}>
                                              @method('DELETE')
                                              @csrf
                                              <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>         
                        @endforeach
                           
                       @endif

                
                <div class="col-sm-5">
                    <div class="container box-shadow p-4">
                        <h3>Final Bill</h3>
                        <h4>Amount: <span id="amount"></span> </h4>
                        <h4>VAT: 13%</h4>
                        <hr />
                        <h3>Total after VAT: <span id="finalAmount"></span></h3>
                        <button type="submit" class="btn btn-success">
                            Confirm Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const amount=document.getElementById('amount');
            const finalAmount=document.getElementById('finalAmount');
            var itemPrice=document.querySelectorAll('.itemPrice');
            let sum=0;
            const amountArray=[];
            itemPrice.forEach(element => {
                amountArray.push(element.innerHTML);
            });
            for (let i = 0; i < amountArray.length; i++) {
                const element = parseInt(amountArray[i]);
                sum+=element;               
            }
            amount.innerHTML=sum;
            var total=((13/100)*sum+sum);
            finalAmount.innerHTML=total;
        </script>
    </body>
</html>
