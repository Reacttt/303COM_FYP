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
         <h3 class='Heading'>Checkout Page</h3>
         <a href="/cart">Back To Cart</a>
         <!-- <h5 class='Action'>Remove all</h5> -->
      </div>

      @php $totalPrice = 0; @endphp
      @php $totalQuantity = 0; @endphp
      @php $subTotal = 0; @endphp
      @php $address_select = 0; @endphp

      @foreach($cart as $cart)
      @php $product = DB::table('product')->where('product_id', $cart->product_id)->first(); @endphp
      @php $category = DB::table('category')->where('category_id', $product->category_id)->first(); @endphp
      @if ($product->product_status === 1 && $category->category_status === 1)
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

         <div class='prices'>
            @if($category->category_status == 1 && $product->product_status == 1)
            <!-- Display Unit Price -->
            @php $subTotal = $product->product_price * $cart->product_quantity; @endphp
            <div class='amount'> {{ $subTotal }} </div>
            @endif
            <br /><br /><br /><br /><br />
         </div>
      </div>

      @php $totalPrice = $totalPrice + $subTotal; @endphp
      @php $totalQuantity = $totalQuantity + $cart->product_quantity; @endphp
      <!-- End Cart Item -->
      @endif
      @endforeach

      <hr>
      <br><br>

      <form action="{{route('placeOrder')}}" method="post" enctype="multipart/form-data">
         @csrf
         <center>
            <h1 class='title'>Shipping Details</h1>
            <br>
            @php $flag = true; @endphp
            @if (!$shipping_details->isEmpty())
            @foreach($shipping_details as $address )
            @if ($flag)
            <table style="width: 30%;">
               <tr>
                  <td>
                     <input type="radio" name="shipping_details_id" value="{{ $address->shipping_details_id }}" id="{{ $address->shipping_details_id }}" checked>
                  </td>
                  <td>{{ $address->shipping_address_line1 }}, {{ $address->shipping_city }}, {{ $address->shipping_postal_code }}, {{ $address->shipping_country }}</td>
               </tr>

            @php $flag = false; @endphp
            @else
            <tr>
                  <td>
                  <input type="radio" name="shipping_details_id" value="{{ $address->shipping_details_id }}" id="{{ $address->shipping_details_id }}">
                  </td>
                  <td>{{ $address->shipping_address_line1 }}, {{ $address->shipping_city }}, {{ $address->shipping_postal_code }}, {{ $address->shipping_country }}</td>
               </tr>
            @endif
            @endforeach
            @else
            No Address Available <br><br>
            @endif
            </table>
            <br>
            <a href="/shippingDetailsForm/new">
               <button type="submit">Add Shipping Address</button><br><br>
            </a>
         </center>

         <br><br><br>

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

            @php $user_id = DB::table('user')->where('user_username', Session::get('user_username'))->value('user_id'); @endphp
            <input type="hidden" name="user_id" value="{{ $user_id }}" readonly>
            <div><button type="submit" class='button'>Place Order</button></div>
         </div>
      </form>
   </div>
</body>

<!-- Template Javascript -->
<?php
'<script>
   var shipping_address = document.getElementsByName("shipping_address");
   var address_select;
   for (var i = 0; i < shipping_address.length; i++) {
      if (shipping_address[i].checked) {
         address_select = shipping_address[i].value;
      }
   }
</script>';
?>

<?php
echo "<script>;</script>";
?>

</html>