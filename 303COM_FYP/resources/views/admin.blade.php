<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>E Store - eCommerce HTML Template</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta content="eCommerce HTML Template Free Download" name="keywords">
   <meta content="eCommerce HTML Template Free Download" name="description">

</head>

<body>

   @include('panel')

   <div id="right-panel" class="right-panel">
      @include('adminHeader')
      <!-- Content -->
      <div class="content">
         <!-- Animated -->
         <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="row">

            <div class="col-lg-3 col-md-6">
                  <div class="card">
                     <div class="card-body">
                        <div class="stat-widget-five">
                           <div class="stat-icon dib flat-color-2">
                              <i class="pe-7s-cart"></i>
                           </div>
                           <div class="stat-content">
                              <div class="text-left dib">
                                 <div class="stat-text"><span class="count">{{ DB::table('product')->sum('product_sale'); }}</span></div>
                                 <div class="stat-heading">Product Sold</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-lg-3 col-md-6">
                  <div class="card">
                     <div class="card-body">
                        <div class="stat-widget-five">
                           <div class="stat-icon dib flat-color-1">
                              <i class="pe-7s-cash"></i>
                           </div>
                           <div class="stat-content">
                              <div class="text-left dib">
                                 @php $payment = DB::table('payment_details')->where('payment_status', 1)->get(); @endphp
                                 @php $total_sales = 0; @endphp
                                 
                                 @foreach ($payment as $payment)
                                 @if ($payment->payment_currency != "MYR")
                                 @php $total_sales += ($payment->payment_total / DB::table('asset')->where('asset_quote', $payment->payment_currency)->value('asset_rate')) @endphp
                                 @else
                                 @php $total_sales += $payment->payment_total; @endphp
                                 @endif
                                 @endforeach
                                 <div class="stat-text">$<span class="count">{{ number_format($total_sales,2) }}</span></div>
                                 <div class="stat-heading">Total Sales (MYR)</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-lg-3 col-md-6">
                  <div class="card">
                     <div class="card-body">
                        <div class="stat-widget-five">
                           <div class="stat-icon dib flat-color-3">
                              <i class="pe-7s-browser"></i>
                           </div>
                           <div class="stat-content">
                              <div class="text-left dib">
                                 <div class="stat-text"><span class="count">{{ DB::table('product')->where('product_status', 1)->count(); }}</span></div>
                                 <div class="stat-heading">Active Products</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-lg-3 col-md-6">
                  <div class="card">
                     <div class="card-body">
                        <div class="stat-widget-five">
                           <div class="stat-icon dib flat-color-4">
                              <i class="pe-7s-users"></i>
                           </div>
                           <div class="stat-content">
                              <div class="text-left dib">
                                 <div class="stat-text"><span class="count">{{ DB::table('user')->where('user_status', 1)->count(); }}</span></div>
                                 <div class="stat-heading">Active Users</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /Widgets -->
            <!--  Traffic  -->
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-body">
                        <h4 class="box-title">Traffic </h4>
                     </div>
                     <div class="row">
                        <div class="col-lg-8">
                           <div class="card-body">
                              <!-- <canvas id="TrafficChart"></canvas> -->
                              <div id="traffic-chart" class="traffic-chart"></div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="card-body">
                              <div class="progress-box progress-1">
                                 <h4 class="por-title">MYR (Fiat)</h4>
                                 <div class="por-txt">PENDING</div>
                                 <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                              </div>
                              <div class="progress-box progress-2">
                                 <h4 class="por-title">USD (Fiat)</h4>
                                 <div class="por-txt">PENDING</div>
                                 <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                              </div>
                              <div class="progress-box progress-2">
                                 <h4 class="por-title">ETH (Crypto)</h4>
                                 <div class="por-txt">PENDING</div>
                                 <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 0%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                              </div>
                              <div class="progress-box progress-2">
                                 <h4 class="por-title">EST (Crypto)</h4>
                                 <div class="por-txt">PENDING</div>
                                 <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 0%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                              </div>
                           </div> <!-- /.card-body -->
                        </div>
                     </div> <!-- /.row -->
                     <div class="card-body"></div>
                  </div>
               </div><!-- /# column -->
            </div>
            <!--  /Traffic -->
            <div class="clearfix"></div>
            <!-- Orders -->
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Recent Orders </h4>
                           @php $order = DB::table('order')->orderBy('updated_at', 'desc')->take(5)->get(); @endphp

                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>User ID</th>
                                    <th>Product</th>
                                    <th>Receiver</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($order as $order)
                                    <tr>
                                       <td>{{ $order->order_id }}</td>
                                       <td>{{ $order->user_id }}</td>
                                       <td><a href="/viewOrder/{{ $order->order_id }}"><button type="submit" class='btn-sm btn-success'>View Order</button><br><br></a></td>
                                       <td>{{ $order->order_first_name }} {{ $order->order_last_name }}</td>
                                       <td>{{ $order->order_country }}</td>
                                       @if ($order->order_status == "Pending Payment")
                                       <td><span class="badge badge-info">Pending Payment</span></td>
                                       @elseif ($order->order_status == "Pending Shipment")
                                       <td><span class="badge badge-warning">Pending Shipment</span></td>
                                       @elseif ($order->order_status == "Shipped")
                                       <td><span class="badge badge-success">Shipped</span></td>
                                       @elseif ($order->order_status == "Completed")
                                       <td><span class="badge badge-success">Completed</span></td>
                                       @elseif ($order->order_status == "Cancelled")
                                       <td><span class="badge badge-danger">Cancelled</span></td>
                                       @endif
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div> <!-- /.table-stats -->
                        </div>
                     </div> <!-- /.card -->
                  </div> <!-- /.col-lg-8 -->
               </div>
               <!-- /.content -->
               <div class="clearfix"></div>
            </div>
         </div>
      </div>
   </div>
   <!-- /#right-panel -->

</body>

</html>

