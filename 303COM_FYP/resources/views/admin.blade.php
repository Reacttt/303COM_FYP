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

    <style>
        #weatherWidget .currentDesc {
            color: #ffffff !important;
        }

        .traffic-chart {
            min-height: 335px;
        }

        #flotPie1 {
            height: 150px;
        }

        #flotPie1 td {
            padding: 3px;
        }

        #flotPie1 table {
            top: 20px !important;
            right: -10px !important;
        }

        .chart-container {
            display: table;
            min-width: 270px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #flotLine5 {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }

        #cellPaiChart {
            height: 160px;
        }
    </style>
</head>

<!--Fetch Chart Data-->

<body>
    @include('panel')

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('adminHeader')
        <!-- /#header -->
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
                <!--  Transactions  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Transactions Summary</h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <!-- <canvas id="TrafficChart"></canvas>   -->
                                        <div id="traffic-chart" class="traffic-chart"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card-body">
                                        <div class="progress-box progress-1">
                                            <h4 class="por-title">Fiat Transactions</h4>
                                            <div class="por-txt" id="total_fiat">0</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div id="fiat_percent" class="progress-bar bg-flat-color-1" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Crypto Transactions</h4>
                                            <div class="por-txt" id="total_crypto">0</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div id="crypto_percent" class="progress-bar bg-flat-color-4" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                    </div> <!-- /.card-body -->
                                </div>
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <!--  /Transactions -->
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-8">
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

                        <div class="col-xl-4">
                            <div class="row">
                                <div class="col-lg-6 col-xl-12">
                                    <div class="card br-0">
                                        <div class="card-body">
                                            <h4 class="mb-3">Order Summary</h4>
                                            <canvas id="Chart4"></canvas>
                                        </div>
                                    </div><!-- /.card -->
                                </div>

                                <div class="col-lg-6 col-xl-12">
                                    <div class="card bg-flat-color-3  ">
                                        <div class="card-body">
                                            <h4 class="card-title m-0  white-color ">Completed Orders</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="flotLine5" class="flot-line"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.col-md-4 -->
                    </div>
                </div>
                <!-- /.orders -->

                <div class="col-lg-14">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Category Sales Chart </h4>
                            <canvas id="Chart3"></canvas>
                        </div>
                    </div>
                </div><!-- /# column -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
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
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>

    <!--Fetch Chart Data-->
    <script>
        // Fiat vs Crypto Transactions (6 Months)
        $(document).ready(function() {
            $.ajax({
                url: "http://127.0.0.1:8000/admin/data1",
                dataType: 'json',
                method: "GET",
                success: function(data) {
                    console.log(data);
                    var month = [];
                    var fiat_month_sale = [];
                    var crypto_month_sale = [];
                    var total_fiat = 0;
                    var total_crypto = 0;

                    for (var i = 0; i < (data.length / 2); i++) {
                        month[i] = data[i].month;
                        fiat_month_sale[i] = data[i].month_sales;
                        total_fiat += data[i].month_sales;
                        crypto_month_sale[i] = data[i + 6].month_sales;
                        total_crypto += data[i + 6].month_sales;
                    }

                    var percent_fiat = parseFloat((total_fiat / (total_fiat + total_crypto)) * 100).toFixed(2);
                    var percent_crypto = parseFloat(100 - percent_fiat).toFixed(2);

                    document.getElementById("total_fiat").innerHTML = parseFloat(total_fiat).toFixed(2) + " MYR (" + percent_fiat + "%)";
                    document.getElementById("total_crypto").innerHTML = parseFloat(total_crypto).toFixed(2) + " MYR (" + percent_crypto + "%)";

                    document.getElementById("fiat_percent").style.width = percent_fiat + "%";
                    document.getElementById("crypto_percent").style.width = percent_crypto + "%";

                    // Traffic Chart using chartist
                    if ($('#traffic-chart').length) {
                        var chart = new Chartist.Line('#traffic-chart', {
                            labels: month,
                            series: [
                                fiat_month_sale,
                                crypto_month_sale,
                            ]
                        }, {
                            low: 0,
                            showArea: true,
                            showLine: false,
                            showPoint: false,
                            fullWidth: true,
                            axisX: {
                                showGrid: true
                            }
                        });

                        chart.on('draw', function(data) {
                            if (data.type === 'line' || data.type === 'area') {
                                data.element.animate({
                                    d: {
                                        begin: 2000 * data.index,
                                        dur: 2000,
                                        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                        to: data.path.clone().stringify(),
                                        easing: Chartist.Svg.Easing.easeOutQuint
                                    }
                                });
                            }
                        });
                    }
                    // Traffic Chart using chartist End 
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })

        // Order Status Summary Doughnut Chart
        $(document).ready(function() {
            $.ajax({
                url: "http://127.0.0.1:8000/admin/data4",
                dataType: 'json',
                method: "GET",
                success: function(data) {
                    console.log(data);
                    var order_status = [];
                    var total = [];

                    for (var i = 0; i < data.length; i++) {
                        order_status[i] = data[i].order_status;
                        total[i] = data[i].total;
                    }

                    //doughut chart
                    var ctx = document.getElementById("Chart4");
                    ctx.height = 160;
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: total,
                                backgroundColor: [
                                    "rgba(0, 194, 146,1.0)",
                                    "rgba(0, 194, 146,0.8)",
                                    "rgba(0, 194, 146,0.6)",
                                    "rgba(0, 194, 146,0.4)",
                                    "rgba(0,0,0,0.07)"
                                ],
                                hoverBackgroundColor: [
                                    "rgba(0, 194, 146,1.0)",
                                    "rgba(0, 194, 146,0.8)",
                                    "rgba(0, 194, 146,0.6)",
                                    "rgba(0, 194, 146,0.4)",
                                    "rgba(0,0,0,0.07)"
                                ]

                            }],
                            labels: order_status
                        },
                        options: {
                            responsive: true
                        }
                    });
                    // doughut chart end
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })

        // Completed Orders
        $(document).ready(function() {
            $.ajax({
                url: "http://127.0.0.1:8000/admin/data2",
                dataType: 'json',
                method: "GET",
                success: function(data) {
                    console.log(data);
                    var completed = [];

                    for (var i = 0; i < data.length; i++) {
                        completed.push([i, data[i].completed]);
                    }

                    var plot = $.plot($('#flotLine5'), [{
                        data: completed,
                        label: 'Completed Orders',
                        color: '#fff'
                    }], {
                        series: {
                            lines: {
                                show: true,
                                lineColor: '#fff',
                                lineWidth: 2
                            },
                            points: {
                                show: true,
                                fill: true,
                                fillColor: "#ffffff",
                                symbol: "circle",
                                radius: 3
                            },
                            shadowSize: 0
                        },
                        points: {
                            show: true,
                        },
                        legend: {
                            show: false
                        },
                        grid: {
                            show: false
                        }
                    });
                    // Line Chart  #flotLine5 End
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })

        // Each Category Total Sales Single Bar Chart
        $(document).ready(function() {
            $.ajax({
                url: "http://127.0.0.1:8000/admin/data3",
                dataType: 'json',
                method: "GET",
                success: function(data) {
                    console.log(data);

                    var category_id = [];
                    var category_name = [];
                    var category_sale = [];

                    for (var i = 0; i < data.length; i++) {
                        category_name[i] = data[i].category_name;
                        category_sale[i] = data[i].category_sale;
                    }

                    // single bar chart
                    var ctx = document.getElementById("Chart3");
                    ctx.height = 75;
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: category_name,
                            datasets: [{
                                label: "Category Sales",
                                data: category_sale,
                                borderColor: "rgba(0, 194, 146, 0.9)",
                                borderWidth: "0",
                                backgroundColor: "rgba(0, 194, 146, 0.5)"
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })
    </script>
</body>

</html>