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
                              @php $fiat_currency = $_COOKIE['fiat-currency']; @endphp
                              @php $crypto_currency = $_COOKIE['crypto-currency']; @endphp
                              @php $fiat_rate = 1; @endphp
                              @php $crypto_rate = 0; @endphp

                              @if ($fiat_currency != "MYR")
                              @php $fiat_rate = DB::table('asset')->where('asset_quote', $fiat_currency)->value('asset_rate'); @endphp
                              @endif

                              @php $crypto_rate = DB::table('asset')->where('asset_quote', $crypto_currency)->value('asset_rate'); @endphp

                              @php $totalQuantity = 0; @endphp
                              @php $fiat_grandTotal = 0; @endphp
                              @php $crypto_grandTotal = 0; @endphp
                              @foreach ($order_item as $item)
                              @if ($order->order_id === $item->order_id)
                              @php $fiat_price = round(($item->order_item_price * $fiat_rate), 2); @endphp
                              @php $crypto_price = round(($item->order_item_price * $crypto_rate), 6); @endphp
                              <div class="row">
                                 <div><img src="/images/{{ $item->order_item_image }}" height='100' width='100' /></div>
                                 <div>
                                    <strong> {{ $item->order_item_name }} </strong> <br>
                                    @if ($method != "crypto")
                                    Unit Price: {{ $fiat_price }} {{ $fiat_currency }} <br>
                                    @php $fiat_subTotal = $fiat_price * $item->order_item_quantity; @endphp
                                    @php $fiat_grandTotal = $fiat_grandTotal + $fiat_subTotal; @endphp
                                    Quantity: {{ $item->order_item_quantity }} item <br>
                                    Subtotal: {{ $fiat_subTotal }} {{ $fiat_currency }} <br>
                                    @php $totalQuantity = $totalQuantity + $item->order_item_quantity; @endphp
                                    @else
                                    Unit Price: {{ $crypto_price }} {{ $crypto_currency }} <br>
                                    @php $crypto_subTotal = $crypto_price * $item->order_item_quantity; @endphp
                                    @php $crypto_grandTotal = $crypto_grandTotal + $crypto_subTotal; @endphp
                                    Quantity: {{ $item->order_item_quantity }} item <br>
                                    Subtotal: {{ $crypto_subTotal }} {{ $crypto_currency }} <br>
                                    @php $totalQuantity = $totalQuantity + $item->order_item_quantity; @endphp
                                    @endif
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
                              <strong> &nbsp; Total Items: </strong> {{ $totalQuantity }} items <br>
                              @if ($method != "crypto")
                              <strong> &nbsp; Grand Total: </strong> {{ $fiat_grandTotal }} {{ $fiat_currency }} <br>
                              @else
                              <strong> &nbsp; Grand Total: </strong> {{ $crypto_grandTotal }} {{ $crypto_currency }} <br>
                              @endif
                              <strong> &nbsp; Receiver: </strong> {{ $order->order_first_name }} {{ $order->order_last_name }} <br>
                              <strong> &nbsp; Shipping Address: </strong> {{ $order->order_address_line1 }}, {{ $order->order_city }}, {{ $order->order_postal_code }}, {{ $order->order_country }}
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
                  @if ($method != "crypto")
                  <div class="card-body">
                     <!-- Credit Card -->
                     <div id="pay-invoice">
                        <div class="card-body">
                           <div class="card-title">
                              <h3 class="text-center">Credit Card</h3>
                           </div>
                           <hr>
                           <form action="{{route('makePayment')}}" method="post" enctype="multipart/form-data">
                              <div class="form-group text-center">
                                 @csrf
                                 <input type="hidden" class="form-control" name="order_id" value="{{ $order->order_id }}" readonly>
                                 <input type="hidden" name="payment_method" class="form-control" value="Credit Card" readonly>
                                 <input type="hidden" name="payment_currency" class="form-control" value="{{ $fiat_currency }}" readonly>
                                 <input type="hidden" name="payment_status" class="form-control" value="1" readonly>
                              </div>
                              <div class="form-group">
                                 <label class="control-label mb-1">Payment Amount ({{ $fiat_currency }})</label>
                                 <input type="text" name="payment_amount" class="form-control" value=" {{ $fiat_grandTotal }}" readonly>
                              </div>
                              <div class="form-group">
                                 <label class="control-label mb-1">Card Holder</label>
                                 <input type="text" name="cc_name" class="form-control">
                                 @error('cc_name')
                                 <small>
                                    {{ $message }}
                                 </small>
                                 @enderror
                              </div>
                              <div class="form-group">
                                 <label class="control-label mb-1">Card Number</label>
                                 <input type="text" name="cc_number" class="form-control">
                                 @error('cc_number')
                                 <small>
                                    {{ $message }}
                                 </small>
                                 @enderror
                              </div>
                              <div class="row">
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label class="control-label mb-1">Expiration</label>
                                       <input type="text" name="cc_exp" class="form-control">
                                       @error('cc_exp')
                                       <small>
                                          {{ $message }}
                                       </small>
                                       @enderror
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <label class="control-label mb-1">Security Code</label>
                                    <div class="input-group">
                                       <input type="text" name="cc_code" class="form-control">
                                       <div class="input-group-addon">
                                          <span class="fa fa-question-circle fa-lg" data-toggle="popover" data-container="body" data-html="true" data-title="Security Code" data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>" data-trigger="hover"></span>
                                       </div>
                                    </div>
                                    @error('cc_code')
                                    <small>
                                       {{ $message }}
                                    </small>
                                    @enderror
                                 </div>
                              </div>
                              <div>
                                 <button type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-lock"></i>&nbsp;
                                    <span>Pay {{ $fiat_grandTotal }} {{ $fiat_currency }}</span>
                                    <span style="display:none;">Sending…</span>
                                 </button>
                              </div>
                           </form>
                        </div>
                        <center>
                           <a href="/payment/{{ $order->order_id }}/crypto"><button type="submit" class='btn btn-warning'>Pay With Crypto Currency</button><br><br></a>
                        </center>
                     </div>
                  </div>
                  @else
                  <div class="card-body">
                     <!-- Crypto -->
                     <div id="pay-invoice">
                        <div class="card-body">
                           <div class="card-title">
                              <h3 class="text-center">Crypto Currency</h3>
                           </div>
                           <hr>
                           <form action="{{route('makePayment')}}" method="post" enctype="multipart/form-data">
                              <div class="form-group text-center">
                                 @csrf
                                 <input type="hidden" class="form-control" name="order_id" value="{{ $order->order_id }}" readonly>
                                 <input type="hidden" name="payment_method" class="form-control" value="Crypto" readonly>
                                 <input type="hidden" name="payment_currency" class="form-control" value="{{ $crypto_currency }}" readonly>
                              </div>
                              <div class="form-group">
                                 <label class="control-label mb-1">Payment Amount ({{ $crypto_currency }})</label>
                                 <input type="text" id="crypto_amount" name="payment_amount" class="form-control" value="{{ $crypto_grandTotal }}" readonly>
                              </div>
                              <div>
                                 @if ($crypto_currency != "ETH")
                                 <button type="button" onClick="" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-lock"></i>&nbsp;
                                    <span>Pay {{ $crypto_grandTotal }} {{ $crypto_currency }} (Token)</span>
                                    <span style="display:none;">Sending…</span>
                                 </button>
                                 @else
                                 <button type="button" onClick="startProcess()" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-lock"></i>&nbsp;
                                    <span>Pay {{ $crypto_grandTotal }} {{ $crypto_currency }} (Native)</span>
                                    <span style="display:none;">Sending…</span>
                                 </button>
                                 @endif
                              </div>
                           </form>
                        </div>
                        <center>
                           <a href="/payment/{{ $order->order_id }}/creditcard"><button type="submit" class='btn btn-warning'>Pay With Credit Card</button><br><br></a>
                        </center>
                     </div>
                  </div>
                  @endif
               </div> <!-- /.card -->
            </div> <!-- /.col-lg-8 -->
         </div>
      </div>
      <!-- /.orders -->
</body>

@include('footer')

<script>
   // ETH Transaction on Metamask

   function startProcess() {
      if ($('#crypto_amount').val() > 0) {
         // run metamsk functions here
         EThAppDeploy.loadEtherium();
      } else {
         alert('Please Enter Valid Amount');
      }
   }

   // Detect Web3
   EThAppDeploy = {
      loadEtherium: async () => {
         if (typeof window.ethereum !== 'undefined') {
            EThAppDeploy.web3Provider = ethereum;
            EThAppDeploy.requestAccount(ethereum);
         } else {
            alert(
               "Not able to locate an Ethereum connection, please install a Metamask wallet"
            );
         }
      },

      /// Request A Account
      requestAccount: async (ethereum) => {
         ethereum
            .request({
               method: 'eth_requestAccounts'
            })
            .then((resp) => {
               //do payments with activated account
               EThAppDeploy.payNow(ethereum, resp[0]);
            })
            .catch((err) => {
               // Some unexpected error.
               console.log(err);
            });
      },

      // Do Payment
      payNow: async (ethereum, from) => {
         var amount = $('#crypto_amount').val();
         ethereum
            .request({
               method: 'eth_sendTransaction',
               params: [{
                  from: from,
                  to: "0xE8dEc2A51E0E6F15a4917306c486165dFb395f1f",
                  value: '0x' + ((amount * 1000000000000000000).toString(16)),
               }, ],
            })
            .then((txHash) => {
               if (txHash) {
                  console.log(txHash);
                  storeTransaction(txHash, amount);
               } else {
                  console.log("Something went wrong. Please try again");
               }
            })
            .catch((error) => {
               console.log(error);
            });
      },
   }
   /***
    *
    * @param Transaction id
    *
    */
   function storeTransaction(txHash, amount) {
      var order_id = "<?php echo $order->order_id; ?>";
      var payment_currency = "<?php echo $crypto_currency; ?>";

      $.ajax({
         url: "{{ route('makePayment') }}",
         type: 'POST',
         data: {
            _token: '{{csrf_token()}}',
            order_id: order_id,
            payment_amount: amount,
            payment_method: "Crypto",
            payment_currency: "ETH",
            payment_transaction: txHash,
            payment_status: 0,
         },
         success: function(response) {
            // reload page after success
            window.location.replace("http://127.0.0.1:8000/order");
            alert("Crypto Payment Submitted Successfully!");
         }
      });
   }

   function send_token(
      contract_address,
      send_token_amount,
      to_address,
      send_account,
      private_key
   ) {
      let wallet = new ethers.Wallet(private_key)
      let walletSigner = wallet.connect(window.ethersProvider)

      window.ethersProvider.getGasPrice().then((currentGasPrice) => {
         let gas_price = ethers.utils.hexlify(parseInt(currentGasPrice))
         console.log(`gas_price: ${gas_price}`)

         if (contract_address) {
            // general token send
            let contract = new ethers.Contract(
               contract_address,
               send_abi,
               walletSigner
            )

            // How many tokens?
            let numberOfTokens = ethers.utils.parseUnits(send_token_amount, 18)
            console.log(`numberOfTokens: ${numberOfTokens}`)

            // Send tokens
            contract.transfer(to_address, numberOfTokens).then((transferResult) => {
               console.dir(transferResult)
               alert("sent token")
            })
         } // ether send
         else {
            const tx = {
               from: send_account,
               to: to_address,
               value: ethers.utils.parseEther(send_token_amount),
               nonce: window.ethersProvider.getTransactionCount(
                  send_account,
                  "latest"
               ),
               gasLimit: ethers.utils.hexlify(gas_limit), // 100000
               gasPrice: gas_price,
            }
            console.dir(tx)
            try {
               walletSigner.sendTransaction(tx).then((transaction) => {
                  console.dir(transaction)
                  alert("Send finished!")
               })
            } catch (error) {
               alert("failed to send!!")
            }
         }
      })
   }
</script>

</html>