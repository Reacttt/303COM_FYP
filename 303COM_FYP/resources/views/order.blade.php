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
                  @foreach($order as $order)
                  @php $order_total = 0; @endphp
                  <tr>
                     <td> {{ $order->order_id }} </td>
                     <td>
                        @foreach($order_item as $items)
                        @if($items->order_id === $order->order_id)
                        {{ $items->order_item_name }} ({{ $items->order_item_quantity }} items)
                        @php $order_total = $order_total + ($items->order_item_quantity * $items->order_item_price); @endphp
                        <br>
                        @endif
                        @endforeach
                     </td>
                     @php $order_quantity = DB::table('order_item')->where('order_id', $order->order_id)->sum('order_item_quantity'); @endphp
                     <td> {{ $order_quantity }} items</td>
                     <td> {{ $order_total }} </td>
                     <td>
                        <b>Name: </b> {{ $order->order_first_name }} {{ $order->order_last_name }} <br>
                        <b>Address Line 1: </b> {{ $order->order_address_line1 }} <br>
                        <b>Address Line 2: </b> {{ $order->order_address_line2 }} <br>
                        <b>City: </b> {{ $order->order_city }}<br>
                        <b>Postal Code: </b> {{ $order->order_postal_code }}<br>
                        <b>Contact: </b> {{ $order->order_contact }}<br>
                     </td>
                     <td></td>
                     <td></td>
                     <td>
                        <a href="viewOrder/{{ $order->order_id}}">
                           <center><button type="submit" class='btn btn-danger'>View</button><br><br></center>
                        </a>
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