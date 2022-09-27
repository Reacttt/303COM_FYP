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
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
   <link href="lib/slick/slick.css" rel="stylesheet">
   <link href="lib/slick/slick-theme.css" rel="stylesheet">

   <!-- Template Stylesheet -->
   <link rel="stylesheet" href="<?php echo asset('css/header.css') ?>" type="text/css">
</head>

<?php
// Logout User is the User Account is Deleted by Admin
if (session()->get('user_username') != NULL) {
   $user_status = DB::table('user')->where('user_username', session()->get('user_username'))->value('user_status');
   if ($user_status == 0) {
      Session()->forget('user_username');
      Session()->put('alert', "User status has been updated by Admin. Please login again!");
   }
}

$asset = DB::table('asset')->first();

if ($asset != NULL) {
   $current_time = time();
   $updated_at = strtotime($asset->updated_at);
   $difference = abs($current_time - $updated_at);

   // If difference is more or equal to 15 minutes
   if ($difference >= (60 * 15)) {
      header('location: http://127.0.0.1:8000/updateAPI');
      die;
   }
}


if (!isset($_COOKIE['fiat-currency'])) {
   $_COOKIE['fiat-currency'] = "MYR";
}

if (!isset($_COOKIE['crypto-currency'])) {
   $_COOKIE['crypto-currency'] = "ETH";
}

?>

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
                  <a href="/updateAPI" class="nav-item nav-link">Refresh API</a>
               </div>
               <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> Fiat ({{ $_COOKIE['fiat-currency'] }}) </a>
                  <div class="dropdown-menu">
                     <a href="/updateCookie/fiat-currency/MYR" class="dropdown-item"> MYR </a>
                     <a href="/updateCookie/fiat-currency/SGD" class="dropdown-item"> SGD </a>
                     <a href="/updateCookie/fiat-currency/USD" class="dropdown-item"> USD </a>
                  </div>
               </div>
               <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> Crypto ({{ $_COOKIE['crypto-currency'] }}) </a>
                  <div class="dropdown-menu">
                     <a href="/updateCookie/crypto-currency/ETH" class="dropdown-item"> ETH </a>
                     <a href="/updateCookie/crypto-currency/BTC" class="dropdown-item"> BTC </a>
                  </div>
               </div>
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
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> Account </a>
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