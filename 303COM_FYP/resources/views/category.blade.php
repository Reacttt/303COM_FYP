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
   <link rel="stylesheet" href="<?php echo asset('css/category.css') ?>" type="text/css">

   <!-- Customized Bootstrap Stylesheet -->
   <link href="css/category.min.css" rel="stylesheet">
</head>

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
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
               <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                  <div class="rounded p-4">
                     <div class="icon mb-3">
                        <i class="fa fa-shopping-bag"></i>
                     </div>
                     <h6> {{ $category->category_name }}</h6>
                     <span>100 Items</span>
                  </div>
               </a>
            </div>
            @endforeach
            <!-- Cateory Button End -->
         </div>
      </div>
   </div>
   <!-- Category End -->

</body>

@include('footer')

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/slick/slick.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>