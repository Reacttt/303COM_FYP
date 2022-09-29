<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Ela Admin - HTML5 Admin Template</title>
   <meta name="description" content="Ela Admin - HTML5 Admin Template">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
   <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

   <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

   <link rel="stylesheet" href="<?php echo asset('css/order.css') ?>" type="text/css">

</head>

@include('header')

<body>

   <div class="breadcrumbs">
      <div class="breadcrumbs-inner">
         <div class="row m-0">
            <div class="col-sm-4">
               <div class="page-header float-left">
                  <div class="page-title">
                     <h2><strong>
                           <center></center>
                        </strong></h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <strong class="card-title">Order List</strong>
         </div>
         <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Product</th>
                     <th>Total Quantity</th>
                     <th>Total Price</th>
                     <th>Shipping Details</th>
                     <th>Order Status</th>
                     <th>Payment Status</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  @php $fiat_currency = $_COOKIE['fiat-currency']; @endphp
                  @php $crypto_currency = $_COOKIE['crypto-currency']; @endphp

                  @if ($fiat_currency != "MYR")
                  @php $fiat_rate = DB::table('asset')->where('asset_quote', $fiat_currency)->value('asset_rate'); @endphp
                  @else
                  @php $fiat_rate = 1; @endphp
                  @endif

                  @php $crypto_rate = DB::table('asset')->where('asset_quote', $_COOKIE['crypto-currency'])->value('asset_rate'); @endphp

                  @foreach($order as $order)
                  @php $fiat_orderTotal = 0; @endphp
                  @php $crypto_orderTotal = 0; @endphp
                  <tr>
                     <td> {{ $order->order_id }} </td>
                     <td>
                        @foreach($order_item as $items)
                        @if($items->order_id === $order->order_id)
                        @php $fiat_price = round(($items->order_item_price * $fiat_rate), 2); @endphp
                        @php $crypto_price = round(($items->order_item_price * $crypto_rate), 6); @endphp

                        {{ $items->order_item_name }} ({{ $items->order_item_quantity }} items)

                        @php $fiat_orderTotal = $fiat_orderTotal + ($items->order_item_quantity * $fiat_price); @endphp
                        @php $crypto_orderTotal = $crypto_orderTotal + ($items->order_item_quantity * $crypto_price); @endphp
                        <br>
                        @endif
                        @endforeach
                     </td>
                     @php $order_quantity = DB::table('order_item')->where('order_id', $order->order_id)->sum('order_item_quantity'); @endphp
                     <td> {{ $order_quantity }} items</td>
                     <td>
                        {{ $fiat_orderTotal }} {{ $fiat_currency }} <br>
                        {{ $crypto_orderTotal }} {{ $crypto_currency }} <br>
                     </td>
                     <td>
                        <b>Name: </b> {{ $order->order_first_name }} {{ $order->order_last_name }} <br>
                        <b>Address Line 1: </b> {{ $order->order_address_line1 }} <br>
                        <b>Address Line 2: </b> {{ $order->order_address_line2 }} <br>
                        <b>City: </b> {{ $order->order_city }} <br>
                        <b>Postal Code: </b> {{ $order->order_postal_code }} <br>
                        <b>Country: </b> {{ $order->order_country }} <br>
                        <b>Contact: </b> {{ $order->order_contact }} <br>
                     </td>
                     <td> {{ $order->order_status }} </td>
                     @php $payment = DB::table('payment_details')->where('order_id', $order->order_id)->first() @endphp
                     <td>
                        @if ($order->order_status != "Cancelled")
                           @if ($payment != null)
                           <b>Method: </b> {{ $payment->payment_method }} <br>
                           <b>Currency: </b> {{ $payment->payment_currency }} <br>
                              @if ($payment->payment_status == 1)
                              <b>Status: </b> Completed <br>
                              @else
                              <b>Status: </b> Pending <br>
                              @endif
                              @if ($payment->payment_method != "Crypto")
                              <b>Transaction: </b> <small> {{ $payment->payment_transaction }} </small><br>
                              @else
                              <b>Transaction: </b> <a href="https://ropsten.etherscan.io/tx/{{ $payment->payment_transaction }}">View Transaction</a><br>
                              @endif
                              @else
                              Pending Payment
                           @endif
                        @else
                        Order Cancelled
                        @endif
                     </td>
                     <td>
                        <center>
                           <a href="/viewOrder/{{ $order->order_id }}"><button type="submit" class='btn btn-success'>View Order</button><br><br></a>
                           @if ($order->order_status == "Pending Payment")
                           <a href="/payment/{{ $order->order_id }}"><button type="submit" class='btn btn-warning'>Pay Order</button><br><br></a>
                           <a href="/updateOrderStatus/{{ $order->order_id }}/Cancelled"><button type="submit" class='btn btn-danger'>Cancel Order</button><br><br></a>
                           @elseif ($order->order_status == "Shipped")
                           <a href="/updateOrderStatus/{{ $order->order_id }}/Completed"><button type="submit" class='btn btn-warning'>Received Order</button><br><br></a>
                           @elseif (DB::table('payment_details')->where('order_id', $order->order_id)->latest('created_at')->first() && $order->order_status != "Request Refund")
                           <a href="/updateOrderStatus/{{ $order->order_id }}/Refund"><button type="submit" class='btn btn-warning'>Request Refund</button><br><br></a>
                           @endif
                        </center>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</body>

@include('footer')

</html>