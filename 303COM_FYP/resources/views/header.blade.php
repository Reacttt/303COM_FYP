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
   <link rel="stylesheet" href="<?php echo asset('css/header.css') ?>" type="text/css">
</head>

<body>

   <!-- Nav Bar Start -->
   <div class="nav">
      <div class="container-fluid">
         <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
               <div class="navbar-nav mr-auto">
                  <a href="/admin" class="nav-item nav-link">Admin Centre</a>
                  <a href="#" class="nav-item nav-link">Refresh API</a>
               </div>
               <a href="#" class="nav-item nav-link">Currency</a>
               <a href="#" class="nav-item nav-link">Language</a>
               @php $username = Session::get('user_username') @endphp
               @if ($username != NULL)
               <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> {{ $username }}</a>
                  <div class="dropdown-menu">
                     <a href="/shippingDetails" class="dropdown-item">Shipping Details</a>
                     <a href="/order" class="dropdown-item">Order</a>
                     <a href="/logoutUser" class="dropdown-item">Logout</a>
                  </div>
               </div>
               @else
               <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> User Account </a>
                  <div class="dropdown-menu">
                     <a href="/login" class="dropdown-item">Login</a>
                     <a href="/register" class="dropdown-item">Sign Up</a>
                  </div>
               </div>
               @endif
         </nav>
      </div>
   </div>

   <!-- Nav Bar End -->

   <!-- Bottom Bar Start -->
   <div class="bottom-bar">
      <div class="container-fluid">
         <div class="row align-items-center">
            <div class="col-md-3">
               <div class="logo">
                  <a href="/">
                     <img src="/images/logo.png" alt="Logo">
                  </a>
               </div>
            </div>
            <div class="col-md-6">
               <!--
               <div class="search">
                  <input type="text" placeholder="Search">
                  <button><i class="fa fa-search"></i></button>
               </div>
               -->
            </div>
            @if ($username != NULL)
            @php $user_id = DB::table('user')->where('user_username', $username)->value('user_id'); @endphp
            @php $cart_quantity = DB::table('cart')->where('user_id', $user_id)->sum('product_quantity'); @endphp
            <div class="col-md-3">
               <div class="user">
                  <a href="/cart" class="btn cart">
                     <i class="fa fa-shopping-cart"></i>
                     <span>({{$cart_quantity}})</span>
                  </a>
               </div>
            </div>
            @endif
         </div>
      </div>
   </div>
   <!-- Bottom Bar End -->

   <!-- Back to Top -->
   <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

   <!-- JavaScript Libraries -->
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
   <script src="lib/easing/easing.min.js"></script>
   <script src="lib/slick/slick.min.js"></script>

   <!-- Template Javascript -->
   <script src="js/main.js"></script>
</body>

<script>
   var msg = '{{Session::get("alert")}}';
   var exist = '{{Session::has("alert")}}';
   if (exist) {
      alert(msg);
   }
</script>

</html>