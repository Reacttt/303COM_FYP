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

@include('header')

<body>

   <div class='container'>
      <form action="{{route('registerUser')}}" method="post" class="form-group" enctype="multipart/form-data" align='center'>
         @csrf
         <input type="text" class="form-control" placeholder="Username" name="user_username" value="{{old('user_username')}}">
         @error('user_username')
         <div class="error">
            {{ $message }}
         </div>
         @enderror
         <br>
         <input type="password" class="form-control" placeholder="Password" name="user_password">
         @error('user_password')
         <div class="error">
            {{ $message }}
         </div>
         @enderror
         <br>
         <input type="password" class="form-control" placeholder="Confirm Password" name="user_password_confirmation">
         @error('user_password_confirmation')
         <div class="error">
            {{ $message }}
         </div>
         @enderror
         <br>
         <input type="text" class="form-control" placeholder="Email" name="user_email" value="{{old('user_email')}}">
         @error('user_email')
         <div class="error">
            {{ $message }}
         </div>
         <input type="hidden" class="form-control" name="user_status" value="1">
         @enderror
         <br>
         <p>By creating an account you agree to our <a href='#'>Terms & Privacy</a>.</p>
         <button type='submit' class='registerbtn'>Register</button>
   </div>

   <div class='container signin'>
      <p>Already have an account? <a href='login'>Sign in</a>.</p>
   </div>

   </form>
   </div>

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