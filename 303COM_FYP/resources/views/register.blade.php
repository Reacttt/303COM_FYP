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
         <br>
         <br>
         <div class='container signin'>
            <p>Already have an account? <a href='login'>Sign in</a>.</p>
         </div>
   </div>

   </form>
   </div>

</body>


@include('footer')

</html>