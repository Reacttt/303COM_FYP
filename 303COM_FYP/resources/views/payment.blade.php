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
   <!-- Orders -->
   <div class="orders">
      <div class="row">

         <div class="col-xl-4 offset-md-1">
            <div class="row">
               <div class="col-lg-6 col-xl-12">
                  <div class="card br-0">
                     <div class="card-header">
                        <strong class="card-title">Order Items</strong>
                     </div>
                     <div class="card-body">
                        <!-- Order Item -->
                        <div id="order-item">
                           <div class="card-body" style="height: 300px; overflow-y: auto">
                              @php $totalQuantity = 0; @endphp
                              @php $grandTotal = 0; @endphp
                              @foreach ($order_item as $item)
                              @if ($order->order_id === $item->order_id)
                              <div class="row">
                                 <div><img src="/images/{{ $item->order_item_image }}" height='100' width='100' /></div>
                                 <div>
                                    <strong> {{ $item->order_item_name }} </strong> <br>
                                    Unit Price: {{ $item->order_item_price }} <br>
                                    Quantity: {{ $item->order_item_quantity }} <br>
                                    @php $subTotal = $item->order_item_price * $item->order_item_quantity; @endphp
                                    @php $totalQuantity = $totalQuantity + $item->order_item_price; @endphp
                                    @php $grandTotal = $grandTotal + $subTotal; @endphp
                                    Subtotal: {{ $subTotal }} <br>
                                 </div>
                              </div>
                              <br>
                              @endif
                              @endforeach
                           </div>
                        </div>
                     </div>
                  </div><!-- /.card -->
               </div>

               <div class="col-lg-6 col-xl-12">
                  <div class="card bg-flat-color-3  ">
                     <div class="card-header">
                        <strong class="card-title">Order Summary</strong>
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div>
                              <strong> &nbsp; Total Items: {{ $totalQuantity }} </strong><br>
                              <strong> &nbsp; Grand Total: {{ $grandTotal }} </strong><br>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div> <!-- /.col-md-4 -->
         <div class="col-xl-5 offset-md-1">
            <div class="card">
               <div class="card-body">
                  <div class="card-header">
                     <strong class="card-title">Payment Method</strong>
                  </div>
                  <div class="card-body">
                     <!-- Credit Card -->
                     <div id="pay-invoice">
                        <div class="card-body">
                           <div class="card-title">
                              <h3 class="text-center">Credit Card</h3>
                           </div>
                           <hr>
                           <form action="#" method="post" novalidate="novalidate">
                              <div class="form-group text-center">
                              </div>
                              <div class="form-group">
                                 <label for="cc-payment" class="control-label mb-1">Payment amount</label>
                                 <input id="cc-payment" name="cc-payment" type="text" class="form-control" value="{{ $grandTotal }}" disabled>
                              </div>
                              <div class="form-group has-success">
                                 <label for="cc-name" class="control-label mb-1">Name on card</label>
                                 <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name">
                                 <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                              </div>
                              <div class="form-group">
                                 <label for="cc-number" class="control-label mb-1">Card number</label>
                                 <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number">
                                 <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                              </div>
                              <div class="row">
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label for="cc-exp" class="control-label mb-1">Expiration</label>
                                       <input id="cc-exp" name="cc-exp" type="tel" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY">
                                       <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <label for="x_card_code" class="control-label mb-1">Security code</label>
                                    <div class="input-group">
                                       <input id="x_card_code" name="x_card_code" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                       <div class="input-group-addon">
                                          <span class="fa fa-question-circle fa-lg" data-toggle="popover" data-container="body" data-html="true" data-title="Security Code" data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>" data-trigger="hover"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div>
                                 <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-lock"></i>&nbsp;
                                    <span id="payment-button-amount">Pay $100.00</span>
                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                 </button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div> <!-- /.card -->
            </div> <!-- /.col-lg-8 -->
         </div>
      </div>
      <!-- /.orders -->
</body>

@include('footer')

</html>