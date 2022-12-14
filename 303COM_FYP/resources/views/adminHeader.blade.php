<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>E-Store | Admin Header</title>

   <!-- Favicon -->
   <link href="images/favicon.png" rel="icon">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">

   <link rel="stylesheet" href=<?php echo asset('css/panel.css') ?>>

</head>

<body>
   <!-- Header-->
   <header id="header" class="header">
      <div class="top-left">
         <div class="navbar-header">
            <a class="navbar-brand" href="/"><img src="/images/logo.png" alt="Logo"></a>
         </div>
      </div>
      <div class="top-right">
         <div class="header-menu">
            <div class="header-left">
               @php $admin = Session::get('admin_username') @endphp
               @if ($admin != NULL)
               <div class="dropdown for-notification">
                  <button class="btn btn-secondary dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false">
                  <a href="/updateAPI" class="nav-item nav-link"><i class="fa fa-refresh"> CoinAPI</i></a></button>
               </div>

               <div class="dropdown for-notification">
                  <button class="btn btn-secondary dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false">
                  <a href="/validateHash" class="nav-item nav-link"><i class="fa fa-flag"> Validate</i></a></button>
               </div>
            </div>

            <div class="user-area dropdown float-right">
               <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img class="user-avatar rounded-circle" src="/images/admin.jpg" alt="User Avatar">
               </a>

               <div class="user-menu dropdown-menu">
                  <a class="nav-link" href="/logoutAdmin"><i class="fa fa-power-off"></i>Logout</a>
               </div>
            </div>
            @endif

         </div>
      </div>
   </header>
   <!-- /#header -->

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