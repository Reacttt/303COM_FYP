<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E Store - eCommerce HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="<?php echo asset('css/home.css') ?>" type="text/css">
</head>

@include('header')

<!-- Main Slider Start -->
<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <nav class="navbar bg-light">
                    <ul class="navbar-nav" style="overflow-y: auto; height:400px">
                        <li class="nav-item">
                            <a class="nav-link" href="/product"><i class="fa fa-list"></i>All Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/category"><i class="fa fa-folder"></i>All Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/product/best"><i class="fa fa-shopping-bag"></i>Best Selling</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/product/new"><i class="fa fa-plus-square"></i>New Arrivals</a>
                        </li>
                        @foreach ($category as $category)
                        @if ($category->category_status == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="/product/{{ $category->category_id }}"><i class="fa fa-angle-right"></i>{{ $category->category_name }}</a>
                        </li>
                        @endif
                        @endforeach
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-6">
                <div class="header-slider normal-slider">
                    <div class="header-slider-item">
                        <img src="/images/slider-1.jpg" alt="Slider Image" />
                        <div class="header-slider-caption">
                            <p>Some text goes here that describes the image</p>
                            <a class="btn" href="/product"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                        </div>
                    </div>
                    <div class="header-slider-item">
                        <img src="/images/slider-2.jpg" alt="Slider Image" />
                        <div class="header-slider-caption">
                            <p>Some text goes here that describes the image</p>
                            <a class="btn" href="/product"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                        </div>
                    </div>
                    <div class="header-slider-item">
                        <img src="/images/slider-3.jpg" alt="Slider Image" />
                        <div class="header-slider-caption">
                            <p>Some text goes here that describes the image</p>
                            <a class="btn" href="/product"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="header-img">
                    <div class="img-item">
                        <img src="/images/category-1.jpg" />
                        <a class="img-text" href="">
                            <p>Some text goes here that describes the image</p>
                        </a>
                    </div>
                    <div class="img-item">
                        <img src="/images/category-2.jpg" />
                        <a class="img-text" href="">
                            <p>Some text goes here that describes the image</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Slider End -->

<!-- Recent Product Start -->
<div class="recent-product product">
    <div class="container-fluid">
        <div class="section-header">
            <h1>Recent Product</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">
            @php $product = DB::table('product')->orderBy('created_at', 'desc')->where('product_status', 1)->take(6)->get(); @endphp
            @php $user_username = Session::get('user_username') @endphp

            @foreach ($product as $product)
            <div class="col-lg-3">
                <div class="product-item">
                    <div class="product-title">
                        <a href="/singleProduct/{{ $product->product_id }}">{{ $product->product_name }}</a>
                    </div>
                    <div class="product-image">
                        <a href="product-detail.html">
                            <img src="/images/{{ $product->product_image }}" alt="Product Image">
                        </a>
                        <div class="product-action">
                            @if ($user_username != null)
                            <a href="/addCart/{{ $product->product_id }}/{{ $user_username }}"><i class="fa fa-cart-plus"></i></a>
                            @endif
                            <a href="/singleProduct/{{ $product->product_id }}"><i class="fa fa-expand"></i></a>
                        </div>
                    </div>
                    <div class="product-price">
                        @php $fiat_price = $product->product_price; @endphp

                        @if ($_COOKIE['fiat-currency'] != "MYR")
                        @php $fiat_rate = DB::table('asset')->where('asset_quote', $_COOKIE['fiat-currency'])->value('asset_rate'); @endphp
                        @php $fiat_price = round(($product->product_price * $fiat_rate), 2); @endphp
                        @else
                        @php $fiat_rate = 1; @endphp
                        @endif

                        @php $crypto_rate = DB::table('asset')->where('asset_quote', $_COOKIE['crypto-currency'])->value('asset_rate'); @endphp
                        @php $crypto_price = round(($product->product_price * $crypto_rate), 6); @endphp

                        <h3>{{ $fiat_price }} {{ $_COOKIE['fiat-currency'] }} | {{ $crypto_price }} {{ $_COOKIE['crypto-currency'] }} </h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Recent Product End -->

<!-- Call to Action Start -->
<div class="call-to-action">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>call us for any queries</h1>
            </div>
            <div class="col-md-6">
                <a href="tel:0123456789">+012-345-6789</a>
            </div>
        </div>
    </div>
</div>
<!-- Call to Action End -->

@include('footer')

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>