<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Dashboard</title>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <style>
    .container{
      max-width: 992px;
      width: 100%;
      margin: 10px auto;
      background: #ffffffda;
      border-radius: 15px;
    }
    body{
        background: linear-gradient(to right, #fc9403 0%, #9a8d92 100%);
    }
  </style>
</head>
<body>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand fw-bolder text-uppercase ml-lg-5" href="#"
                >Admin</a
            >
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">      
                    {{-- auth links --}}
                    <ul class="navbar-nav ml-auto align-items-lg-center">
                          @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest 
                </ul>
            </div>
        </nav>
        <div class="container p-4">
              <h4 class="mt-3">Add a product:</h4>
              <form method="POST" action="/electronic-devices" enctype="multipart/form-data">
                @csrf
                <input type="text" name="product_name" placeholder="Enter the product name" class="form-control mb-3">
                <input type="file" name="photo" class="form-control-file mb-3 btn btn-success"> 
                <input type="text" name="price" placeholder="Enter the price" class="form-control mb-3">
                <button class="btn btn-success mb-3">Add</button>
              </form>
              <form method="POST" action="/edit">
                @csrf
                  <h4>Edit Product:</h4>
                  <input class="form-control mb-3" type="text" name="product_id" placeholder="Enter product ID for editing">
                  <button class="btn btn-primary mb-3" type="submit">Edit</button>
              </form>
        </div>
</body>
</html>