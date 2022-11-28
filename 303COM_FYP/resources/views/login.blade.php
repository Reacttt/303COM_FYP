<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>E-Store | Login </title>

   <!-- Favicon -->
   <link href="images/favicon.png" rel="icon">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

   <!-- Template Stylesheet -->
   <link rel="stylesheet" href="<?php echo asset('css/header.css') ?>" type="text/css">
</head>

@include('header')

<body>
   <center>
      <h4><b> Sign In </b></h4>
   </center>
   <br>

   <div class='container'>
      <form action="{{route('loginUser')}}" method="post" class="form-group" action="/login" enctype="multipart/form-data">
         @csrf
         <input type="text" class="form-control" name="user_username" placeholder="Username" value="{{old('user_username')}}">
         @error('user_username')
         <div class="error">
            {{ $message }}
         </div>
         @enderror
         <br>
         <input type="password" class="form-control" name="user_password" placeholder="Password">
         @error('user_password')
         <div class="error">
            {{ $message }}
         </div>
         @enderror
         <br>
         <center>
            <div class='container signin'>
               <button type="submit" name="login_submit" class='registerbtn'>Login</button><br><br>
               <a href="register">Sign Up here</a>
            </div>
         </center>

         <br><br><br><br><br><br><br><br>
      </form>
   </div>

</body>

@include('footer')

</html>