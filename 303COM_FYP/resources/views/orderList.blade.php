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

</head>

<body>
   @include('panel')

   <div id="right-panel" class="right-panel">
      @include('adminHeader')

      <div class="breadcrumbs">
         <div class="breadcrumbs-inner">
            <div class="row m-0">
               <div class="col-sm-4">
                  <div class="page-header float-left">
                     <div class="page-title">
                        <h1><b>Order List</b></h1>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="content">
         <div class="animated fadeIn">
            <div class="row">

               <div class="col-md-12">
                  <div class="card">
                     <div class="card-header">
                        @if ($filter == "pendingPayment")
                        <strong class="card-title">Pending Payment Order</strong>
                        @elseif ($filter == "pendingShipment")
                        <strong class="card-title">Pending Shipment Order</strong>
                        @elseif ($filter == "completed")
                        <strong class="card-title">Completed Order</strong>
                        @elseif ($filter == "cancelled")
                        <strong class="card-title">Cancelled Order</strong>
                        @else
                        <strong class="card-title">All Order</strong>
                        @endif
                     </div>
                     <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>User ID</th>
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
                                 <td> {{ $order->user_id }} </td>
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
                                 <td> {{ $order_total }} MYR </td>
                                 <td>
                                    <b>Name: </b> {{ $order->order_first_name }} {{ $order->order_last_name }} <br>
                                    <b>Address Line 1: </b> {{ $order->order_address_line1 }} <br>
                                    <b>Address Line 2: </b> {{ $order->order_address_line2 }} <br>
                                    <b>City: </b> {{ $order->order_city }}<br>
                                    <b>Postal Code: </b> {{ $order->order_postal_code }}<br>
                                    <b>Country: </b> {{ $order->order_country }}<br>
                                    <b>Contact: </b> {{ $order->order_contact }}<br>
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
                                          @elseif ($payment->payment_status == 3)
                                          <b>Status: </b> Failed <br>
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
                                       @if ($order->order_status == "Pending Shipment")
                                       <a href="/updateOrderStatus/{{ $order->order_id }}/Shipped"><button type="submit" class='btn btn-success'>Ship Order</button><br><br></a>
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

            </div>
         </div><!-- .animated -->
      </div><!-- .content -->

      <div class="clearfix"></div>

      <footer class="site-footer">
         <div class="footer-inner bg-white">
            <div class="row">
               <div class="col-sm-6">
                  Copyright &copy; 2018 Ela Admin
               </div>
               <div class="col-sm-6 text-right">
                  Designed by <a href="https://colorlib.com">Colorlib</a>
               </div>
            </div>
         </div>
      </footer>

   </div><!-- /#right-panel -->

   <!-- Right Panel -->

</body>

</html>