<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>E-Store | View Order</title>

   <!-- Favicon -->
   <link href="images/favicon.png" rel="icon">

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
         <h3 class='Heading'>Order Details #{{ $order->order_id }}</h3>
         <a href="/order">Back To Order</a>
         <!-- <h5 class='Action'>Remove all</h5> -->
      </div>

      @php $totalPrice = 0; @endphp
      @php $totalQuantity = 0; @endphp
      @php $subTotal = 0; @endphp

      @foreach($order_item as $items)
      <div class='Cart-Items'>
         <div class='image-box'>
            <img src="/images/{{ $items->order_item_image }}" height='200' width='200' />
         </div>
         <div class='about'>
            <h1 class='title'> {{ $items->order_item_name }}</h1>
            <h3 class='subtitle'> {{ $items->order_item_description }}</h3>
            <br><br><br><br><br>
            <h3 class='subtitle'>Unit Price: {{ $items->order_item_price }}</h3>
         </div>

         <div class='prices'>
            @php $subTotal = $items->order_item_price * $items->order_item_quantity; @endphp
            <div class='amount'> {{ $subTotal }} </div>
            <br /><br /><br /><br /><br />
         </div>
      </div>

      @php $totalPrice = $totalPrice + $subTotal; @endphp
      @php $totalQuantity = $totalQuantity + $items->order_item_quantity; @endphp
      <!-- End Cart Item -->
      @endforeach

      <hr>
      <br><br>

      <center>
         <h1 class='title'>Shipping Details</h1>
         <br>
         <table style="width: 40%;">
            <tr>
               <td>Name - </td>
               <td>{{ $order->order_first_name }}, {{ $order->order_last_name }} </td>
            </tr>
            <tr>
               <td>Address - </td>
               <td>{{ $order->order_address_line1 }}, {{ $order->order_city }}, {{ $order->order_postal_code }}, {{ $order->order_country }}</td>
            </tr>
            <tr>
               <td>Contact - </td>
               <td>{{ $order->order_contact }}</td>
            </tr>
         </table>
         <br><br><br>
      </center>

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
      </div>
</body>

<!-- Template Javascript -->
<script src="js/main.js"></script>

</html>