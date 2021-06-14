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
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
        />
        <style>
            .search-btn {
                background-color: orange;
            }
            .search-btn:hover {
                background-color: rgb(248, 206, 128);
            }
            .bi-cart {
                font-size: 1.5rem;
                color: orange;
            }
            .carousel-container {
                max-width: 768px;
                width: 95%;
                min-width: 300px;
                margin: 15px auto;
            }
            .carousel-image {
                max-width: 100%;
                height: 300px;
            }
            .container {
                width: 80%;
            }
            .card {
                margin: 0px 15px;
                margin-bottom: 20px;
            }
            .card-img-top {
                height: 286px;
                object-fit: contain;
            }
            footer{
              background-color: rgba(243, 146, 55, 0.26);
            }
            .footer-copyright{
                background-color: orange;
                color: whitesmoke;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand fw-bolder text-uppercase ml-lg-5" href="#"
                >Ecommerce</a
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
                <form class="form-inline my-2 my-lg-0">
                    <input
                        class="form-control mr-sm-2"
                        type="search"
                        placeholder="Search for products..."
                        aria-label="Search"
                    />
                    <button
                        class="btn btn-outline my-2 my-sm-0 search-btn"
                        type="submit"
                    >
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <ul class="navbar-nav ml-auto align-items-lg-center">
                    <li class="nav-item">
                        <a href="/cart" class="nav-link my-auto"
                            ><i class="bi bi-cart"></i
                        ></a>
                    </li>
                    <li class="nav-item dropdown dropdown-menu-end">
                        <a
                            class="nav-link dropdown-toggle my-auto"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            Categories
                        </a>
                        <div
                            class="dropdown-menu"
                            aria-labelledby="navbarDropdown"
                        >
                            <a class="dropdown-item" href="/electronic-devices"
                                >Electronic Devices</a
                            >
                            <a class="dropdown-item" href="#"
                                >Electronic Accessories</a
                            >
                            <a class="dropdown-item" href="#"
                                >TV and Home Appliances</a
                            >
                            <a class="dropdown-item" href="#"
                                >Health and Beauty</a
                            >
                            <a class="dropdown-item" href="#"
                                >Babies and Toys</a
                            >
                            <a class="dropdown-item" href="#"
                                >Groceries and Pets</a
                            >
                            <a class="dropdown-item" href="#"
                                >Home and Lifestyle</a
                            >
                            <a class="dropdown-item" href="#"
                                >Women's Fashion</a
                            >
                            <a class="dropdown-item" href="#">Men's Fashion</a>
                            <a class="dropdown-item" href="#"
                                >Watches and Accessories</a
                            >
                            <a class="dropdown-item" href="#"
                                >Sports and Outdoor</a
                            >
                            <a class="dropdown-item" href="#"
                                >Automotive and Motorbike</a
                            >
                        </div>
                    </li>
                    {{-- auth links --}}
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
        {{-- Carousel --}}
        <div class="carousel-container">
            <div
                id="myslideshow"
                class="carousel slide carousel-fade"
                data-ride="carousel"
            >
                <ol class="carousel-indicators">
                    <li
                        class="active"
                        data-target="#myslideshow"
                        data-slide-to="0"
                    ></li>
                    <li data-target="#myslideshow" data-slide-to="1"></li>
                    <li data-target="#myslideshow" data-slide-to="2"></li>
                    <li data-target="#myslideshow" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img
                            src="https://3c5239fcccdc41677a03-1135555c8dfc8b32dc5b4bc9765d8ae5.ssl.cf1.rackcdn.com/Black-Friday-Sale-Red-4x8in-300dpi-KB-compressor.jpg"
                            class="d-block w-100 carousel-image"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="https://img.freepik.com/free-vector/modern-mega-sale-banner-template_1361-2678.jpg?size=626&ext=jpg"
                            class="d-block w-100 carousel-image"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/bb217077269367.5c828cc45ccbb.jpg"
                            class="d-block w-100 carousel-image"
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="https://images-na.ssl-images-amazon.com/images/I/61OCCiLGj6L._AC_SL1500_.jpg"
                            class="d-block w-100 carousel-image"
                        />
                    </div>
                </div>
            </div>
        </div>
        {{-- Card --}}
        <div class="container text-center">
            <h2 class="cat-heading mx-5 my-5">Browse Categories:</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <img
                            class="card-img-top"
                            src="https://3dwarehouse.sketchup.com/warehouse/v1.0/publiccontent/9688850f-f59a-4a8c-af90-686efeadba94"
                        />
                        <div class="card-body">
                            <h5 class="card-title">Electronic Devices</h5>
                            <p class="card-text">
                                Check out our latest electronic devices.
                            </p>
                            <a href="/electronic-devices" class="btn btn-primary">See items</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <img
                            class="card-img-top"
                            src="https://blessingstelecom.com/img/developerimg/choco_blessingstelecom_20200113100659_db/mebase/CustomSectionStyle/Images/original_200219061202_5e4cd1b2c5eb3.jpg"
                        />
                        <div class="card-body">
                            <h5 class="card-title">Electronic Accessories</h5>
                            <p class="card-text">
                                Check out our latest electronic accessories.
                            </p>
                            <a href="#" class="btn btn-primary">See items</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <img
                            class="card-img-top"
                            src="https://st2.depositphotos.com/1273062/7659/i/600/depositphotos_76592037-stock-photo-home-appliances-gas-cooker-tv.jpg"
                        />
                        <div class="card-body">
                            <h5 class="card-title">TV and Home Appliances</h5>
                            <p class="card-text">
                                Check out our latest TV and home appliances.                                
                            </p>
                            <a href="#" class="btn btn-primary">See items</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <img
                            class="card-img-top"
                            src="https://st1.thehealthsite.com/wp-content/uploads/2019/11/beauty-products-2.jpg"
                        />
                        <div class="card-body">
                            <h5 class="card-title">Health and Beauty</h5>
                            <p class="card-text">
                                Check out our latest health and beauty products.
                            </p>
                            <a href="#" class="btn btn-primary">See items</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <img
                            class="card-img-top"
                            src="https://m.media-amazon.com/images/I/71cbQlEcJpL._AC_SS450_.jpg"
                        />
                        <div class="card-body">
                            <h5 class="card-title">Babies and Toys</h5>
                            <p class="card-text">
                                Check out our latest babies and toy products.
                            </p>
                            <a href="#" class="btn btn-primary">See items</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <img
                            class="card-img-top"
                            src="https://thumbs.dreamstime.com/z/pet-products-supermarket-36015742.jpg"
                        />
                        <div class="card-body">
                            <h5 class="card-title">Groceries and Pets</h5>
                            <p class="card-text">
                                Check out our latest groceries and pet items.
                            </p>
                            <a href="#" class="btn btn-primary">See items</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <img
                            class="card-img-top"
                            src="https://ethicalinfluencers.co.uk/wp-content/uploads/2019/10/Net-Zero-Co-1.jpg"
                        />
                        <div class="card-body">
                            <h5 class="card-title">Home and Lifestyle</h5>
                            <p class="card-text">
                                Check out our latest home and lifestyle products.
                            </p>
                            <a href="#" class="btn btn-primary">See items</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <img
                            class="card-img-top"
                            src="http://productsadvices.com/wp-content/uploads/2019/05/womens-clothing.jpg"
                        />
                        <div class="card-body">
                            <h5 class="card-title">Women's Fashion</h5>
                            <p class="card-text">
                               Check out our latest women's fashion products.
                            </p>
                            <a href="#" class="btn btn-primary">See items</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <img
                            class="card-img-top"
                            src="https://www.oberlo.com/media/1603954895-gentlemans-fashion-flatlay.jpg?fit=max&fm=jpg&w=1824"
                        />
                        <div class="card-body">
                            <h5 class="card-title">Men's Fashion</h5>
                            <p class="card-text">
                                Check out our latest men's fashion items.
                            </p>
                            <a href="#" class="btn btn-primary">See items</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <img
                            class="card-img-top"
                            src="https://i2.wp.com/thetruthaboutwatches.com/wp-content/uploads/2020/01/Watches.jpg?resize=550%2C413&ssl=1"
                        />
                        <div class="card-body">
                            <h5 class="card-title">Watches and Accessories</h5>
                            <p class="card-text">
                                Check out our latest watches and accessories.
                            </p>
                            <a href="#" class="btn btn-primary">See items</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <img
                            class="card-img-top"
                            src="https://www.tencom.com/hs-fs/hubfs/sports-1.jpeg?width=600&name=sports-1.jpeg"
                        />
                        <div class="card-body">
                            <h5 class="card-title">Sports and Outdoors</h5>
                            <p class="card-text">
                                Check out our sports and outdoor products.
                            </p>
                            <a href="#" class="btn btn-primary">See items</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <img
                            class="card-img-top"
                            src="https://media.autoexpress.co.uk/image/private/s--X-WVjvBW--/f_auto,t_content-image-full-desktop@1/v1620906940/autoexpress/2021/05/Product%20Awards%202021.jpg"
                        />
                        <div class="card-body">
                            <h5 class="card-title">Automotive and Motorbike</h5>
                            <p class="card-text">
                                Check out our latest automotive and motorbike products.
                            </p>
                            <a href="#" class="btn btn-primary">See items</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
<footer class="page-footer font-small mdb-color lighten-3 pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">

        <!-- Content -->
        <h5 class="font-weight-bold text-uppercase mb-4">ECOMMERCE</h5>
        <p>We provide the best products with best deals and quality.</p>
      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mb-4">About</h5>

        <ul class="list-unstyled">
          <li>
            <p>
              <a href="#!">REVIEWS</a>
            </p>
          </li>
          <li>
            <p>
              <a href="#!">CUSTOMER SUPPORT</a>
            </p>
          </li>
          <li>
            <p>
              <a href="#!">TERMS AND CONDITIONS</a>
            </p>
          </li>
          <li>
            <p>
              <a href="#!">PRIVACY POLICY</a>
            </p>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">

        <!-- Contact details -->
        <h5 class="font-weight-bold text-uppercase mb-4">Address</h5>

        <ul class="list-unstyled">
          <li>
            <p>
              <i class="fas fa-home mr-3"></i>Tinkune, Kathmandu</p>
          </li>
          <li>
            <p>
              <i class="fas fa-envelope mr-3"></i>e-commerce@mail.com</p>
          </li>
          <li>
            <p>
              <i class="fas fa-phone mr-3"></i> +977 123456789</p>
          </li>
          <li>
            <p>
              <i class="fas fa-print mr-3"></i> +977 123443221</p>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 text-center mx-auto my-4">

        <!-- Social buttons -->
        <h5 class="font-weight-bold text-uppercase mb-4">Follow Us</h5>

        <!-- Facebook -->
        <a type="button" class="btn-floating btn-fb">
          <i class="fab fa-facebook-f"></i>
        </a>
        <!-- Twitter -->
        <a type="button" class="btn-floating btn-tw">
          <i class="fab fa-twitter"></i>
        </a>
        <!-- Google +-->
        <a type="button" class="btn-floating btn-gplus">
          <i class="fab fa-google-plus-g"></i>
        </a>
        <!-- Dribbble -->
        <a type="button" class="btn-floating btn-dribbble">
          <i class="fab fa-dribbble"></i>
        </a>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2021 Copyright:
    <a href="#">e-commerce.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
<script src="https://kit.fontawesome.com/366007de64.js" crossorigin="anonymous"></script>
</html>
