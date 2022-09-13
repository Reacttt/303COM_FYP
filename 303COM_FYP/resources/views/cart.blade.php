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

      @php $totalPrice = 0; @endphp
      @php $totalQuantity = 0; @endphp
      @php $subTotal = 0; @endphp

      @foreach($cart as $cart)
      @php $product = DB::table('product')->where('product_id', $cart->product_id)->first(); @endphp
      @php $category = DB::table('category')->where('category_id', $product->category_id)->first(); @endphp
      @php $user_id = DB::table('user')->where('user_username', Session::get('user_username'))->value('user_id'); @endphp
      @if ($cart->user_id === $user_id)
      <div class='Cart-Items'>
         <div class='image-box'>
            <img src="/images/{{ $product->product_image }}" height='200' width='200' />
         </div>
         <div class='about'>
            <h1 class='title'> {{ $product->product_name }}</h1>
            <h3 class='subtitle'> {{ $product->product_description }}</h3>
            <br><br><br><br><br>
            <h3 class='subtitle'>Unit Price: {{ $product->product_price }}</h3>
         </div>

         <div class='counter'>
            @if($category->category_status == 1 && $product->product_status == 1)
               @if($cart->product_quantity > 1 )
               <!-- Decrease Button -->
               <a href="/updateCartQuantity/{{ $user_id }}/{{ $cart->product_id }}/-1"><button type="submit" class="btn"><i class="fa fa-minus"></i></button></a>
               @else
               <button type="submit" class="btn" disabled><i class="fa fa-minus"></i></button>
               @endif

               <div class='count'> {{ $cart->product_quantity }}</div>

               <!-- Increase Button -->
               @if($cart->product_quantity < $product->product_stock)
                  <a href="/updateCartQuantity/{{ $user_id }}/{{ $cart->product_id }}/1"><button type="submit" class="btn"><i class="fa fa-plus"></i></button></a>
               @else
                  <button type="submit" class="btn" disabled><i class="fa fa-plus"></i>
               @endif
               
            @else
            <div class='count'> Not Available </div>
            @endif
         </div>

         <div class='prices'>
         @if($category->category_status == 1 && $product->product_status == 1)
            <!-- Display Unit Price -->
            @php $subTotal = $product->product_price * $cart->product_quantity; @endphp
            <div class='amount'> {{ $subTotal }} </div>
         @endif
            <br /><br /><br /><br /><br />
            <!-- Remove Button -->
            <a href="/removeCart/{{ $user_id }}/{{ $cart->product_id }}"><button type='submit'>Remove</button></a>
         </div>
      </div>
      
      @php $totalPrice = $totalPrice + $subTotal; @endphp
      @php $totalQuantity = $totalQuantity + $cart->product_quantity; @endphp

      @endif
      @endforeach
      <!-- End Cart Item -->

      <hr>
      <br><br>

      <div class='checkout'>
         <div class='total'>
            <div>
               <div class='Subtotal'>Total</div>
            </div>
            <div class='total-amount'> {{ $totalPrice }} </div>
         </div>

         <br>
         <div class='items'> {{ $totalQuantity }} items </div>
         <br>

         <a href="/checkout">
            <div><button class='button'>Checkout</button></div>
         </a>
         </form>
      </div>
</body>

<!-- Template Javascript -->
<script src="js/main.js"></script>

</html>