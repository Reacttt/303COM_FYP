<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>E-Store | Category </title>

   <!-- Favicon -->
   <link href="images/favicon.png" rel="icon">

   <!-- Favicon -->
   <link href="img/favicon.ico" rel="icon">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

   <!-- Template Stylesheet -->
   <link rel="stylesheet" href="<?php echo asset('css/category.css') ?>" type="text/css">

   <!-- Customized Bootstrap Stylesheet -->
   <link href="css/category.min.css" rel="stylesheet">
</head>

<style>
   .backimg{
      background: url(/images/logo.png)
   }
</style>

@include('header')

<body>

   <!-- Category Start -->
   <div class="container-xxl py-5">
      <div class="container">
         <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Category</h1>
         </div>
         <!-- Cateory Button Start -->
         <div class="row g-4">
            @foreach($category as $category)
            @if ($category->category_status == 1)
            @php $active_product = DB::table('product')->where('category_id', $category->category_id)->where('product_status', 1)->where('category_status', 1)->count(); @endphp

            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
               <a class="cat-item d-block bg-light text-center rounded p-3" href="/product/{{ $category->category_id }}">
                  <!-- <div class="rounded p-4" style="background-image:url(/images/{{$category->category_image}}); background-size:cover"> -->
                  <div class="rounded p-4">

                     <h6> {{ $category->category_name }}</h6>
                     <span> {{ $active_product }} Items</span>
                  </div>
               </a>
            </div>
            @endif
            @endforeach
            <!-- Cateory Button End -->
         </div>
      </div>
   </div>
   <!-- Category End -->

</body>

@include('footer')

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>