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

@include('header')

<body>
	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="/images/{{ $product->product_image }}" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3> {{ $product->product_name }} </h3>
						<h2> {{ $product->product_price }} </h2>
						<ul class="list">

							<li><a class="active" href="#"><span>Category</span> : {{ $category_name }}</a></li>
							@if ($product->product_status == 1)
							<li><a href="#"><span>Availibility</span> : In Stock</a></li>
							@else
							<li><a href="#"><span>Availibility</span> : Not Available</a></li>
							@endif
						</ul>
						<p> {{ $product->product_description }} </p>
						@php $user_username = Session::get('user_username') @endphp
						@if ($user_username != null)
						<div class="card_area d-flex align-items-center">
							<a class="primary-btn" href="/addCart/{{ $product->product_id }}/{{ $user_username }}">Add to Cart</a>
						</div>
						@else
						<div class="card_area d-flex align-items-center">
							<a class="primary-btn" href="/login">Login to Add to Cart</a>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<br><br>
</body>

@include('footer')

</html>