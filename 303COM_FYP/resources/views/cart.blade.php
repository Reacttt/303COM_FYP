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
   <link rel="stylesheet" href="<?php echo asset('css/cart.css') ?>" type="text/css">
</head>

<body>
   <div class='CartContainer'>
      <div class='Header'>
         <h3 class='Heading'>Shopping Cart</h3>
         <a href="/">Back To Home</a>
         <!-- <h5 class='Action'>Remove all</h5> -->
      </div>

      <div class='Cart-Items'>
         <div class='image-box'>
            <img src="images/brand-1.png" height='100' width='150' />
         </div>
         <div class='about'>
            <h1 class='title'> Product Name </h1>
            <h3 class='subtitle'> Product Description</h3>
            <br><br><br><br><br>
            <h3 class='subtitle'>Unit Price: Unit Price $</h3>
         </div>

         <div class='counter'>

            <!-- Decrease Button -->
            <button type="submit">-</button>

            <div class='count'>1</div>

            <!-- Increase Button -->
            <button type="submit">+</button>

         </div>
         <div class='prices'>
            <!-- Display Unit Price -->
            <div class='amount'> Unit Price $</div>
            <br /><br /><br /><br /><br />

            <!-- Remove Button -->
            <button type='submit'>Remove</button>
            </form>
         </div>
      </div>

      <hr>
      <br><br>

      <div class='checkout'>
         <div class='total'>
            <div>
               <div class='Subtotal'>Sub-Total</div>
            </div>
            <div class='total-amount'> SubTotal $</div>
         </div>

         <br>
         <div class='items'> TotalQuantity </div>
         <br>

         <a href="/order">
            <div><button class='button'>Checkout</button></div>
         </a>
         </form>
      </div>
</body>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/slick/slick.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>

</html>