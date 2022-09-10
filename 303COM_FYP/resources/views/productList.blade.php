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

	<link rel="stylesheet" href="<?php echo asset('css/productListing.css') ?>" type="text/css">
</head>

<!--
            CSS
            ============================================= -->
<link rel="stylesheet" href="css/linearicons.css">
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/themify-icons.css">
<link rel="stylesheet" href="css/nice-select.css">
<link rel="stylesheet" href="css/nouislider.min.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/main.css">
</head>

@include('header')

<body>
	<!-- Start Category Nav -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Browse Categories</div>
					<ul class="main-categories">
						@php $all_active_product = DB::table('product')->where('product_status', 1)->count(); @endphp
						@php $all_active_category = DB::table('category')->where('category_status', 1)->count(); @endphp

						<li class="main-nav-list"><a href="/product"><span class="lnr lnr-arrow-right"></span>All Products<span class="number">({{$all_active_product}})</span></a>
						</li>
						<li class="main-nav-list"><a href="/product/best"><span class="lnr lnr-arrow-right"></span>Best Selling</span></a>
						</li>
						<li class="main-nav-list"><a href="/product/new"><span class="lnr lnr-arrow-right"></span>New Arrivals</span></a>
						</li>

						<li class="main-nav-list"><a data-toggle="collapse" href="#meatFish" aria-expanded="false" aria-controls="meatFish"><span class="lnr lnr-arrow-right"></span>Categories<span class="number">({{$all_active_category}})</span></a>
							<ul class="collapse" id="meatFish" data-toggle="collapse" aria-expanded="false" aria-controls="meatFish">
								@foreach ($category as $category)
								@php $active_product = DB::table('product')->where('category_id', $category->category_id)->where('product_status', 1)->count(); @endphp
								<li class="main-nav-list child"><a href="/product/{{ $category->category_id }}">{{ $category->category_name }}<span class="number">({{$active_product}})</span></a></li>
								@endforeach
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<!-- End Category Bar -->
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting">
						<select>
							<option value="1">Default sorting</option>
						</select>
					</div>
				</div>
				<!-- End Filter Bar -->
				<!-- Start Product List -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<!-- Start Single Product -->
						@foreach($product as $product)
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="/images/{{ $product->product_image }}" alt="">
								<div class="product-details">
									<h6> {{ $product->product_name }}</h6>
									<div class="price">
										<h6>{{ $product->product_price }}</h6>
										@php $product_price_old = $product->product_price + rand(5,10); @endphp
										<h6 class="l-through"> {{ $product_price_old }}</h6>
									</div>
									<div class="prd-bottom">
										@php $user_username = Session::get('user_username') @endphp
										@if ($user_username != null)
										<a href="/addCart/{{ $product->product_id }}/{{ $user_username }}" class="social-info">
											<i class="fa fa-shopping-bag"></i>
											<p class="hover-text">add to bag</p>
										</a>
										@endif
										<a href="" class="social-info">
											<i class="fa fa-expand"></i>
											<p class="hover-text">view more</p>
										</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						<!-- End Single Product -->
					</div>
				</section>
				<!-- End Product List -->
			</div>
		</div>
	</div>

	<!-- Modal Quick Product View -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="container relative">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="product-quick-view">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="quick-view-carousel">
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="quick-view-content">
								<div class="top">
									<h3 class="head">Mill Oil 1000W Heater, White</h3>
									<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
									<div class="category">Category: <span>Household</span></div>
									<div class="available">Availibility: <span>In Stock</span></div>
								</div>
								<div class="middle">
									<p class="content">Mill Oil is an innovative oil filled radiator with the most modern technology. If you are
										looking for something that can make your interior look awesome, and at the same time give you the pleasant
										warm feeling during the winter.</p>
									<a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
								</div>
								<div class="bottom">
									<div class="color-picker d-flex align-items-center">Color:
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
									</div>
									<div class="quantity-container d-flex align-items-center mt-15">
										Quantity:
										<input type="text" class="quantity-amount ml-15" value="1" />
										<div class="arrow-btn d-inline-flex flex-column">
											<button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
											<button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
										</div>

									</div>
									<div class="d-flex mt-20">
										<a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>