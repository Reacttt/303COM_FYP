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
      <!-- Header-->
      <header id="header" class="header">
         <div class="top-left">
            <div class="navbar-header">
               <a class="navbar-brand" href="/"><img src="images/logo.png" alt="Logo"></a>
            </div>
         </div>
         <div class="top-right">
            <div class="header-menu">
               <div class="header-left">

                  <div class="dropdown for-notification">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="count bg-danger">3</span>
                     </button>
                     <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="red">You have 3 Notification</p>
                        <a class="dropdown-item media" href="#">
                           <i class="fa fa-check"></i>
                           <p>Server #1 overloaded.</p>
                        </a>
                        <a class="dropdown-item media" href="#">
                           <i class="fa fa-info"></i>
                           <p>Server #2 overloaded.</p>
                        </a>
                        <a class="dropdown-item media" href="#">
                           <i class="fa fa-warning"></i>
                           <p>Server #3 overloaded.</p>
                        </a>
                     </div>
                  </div>

                  <div class="dropdown for-message">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-envelope"></i>
                        <span class="count bg-primary">4</span>
                     </button>
                     <div class="dropdown-menu" aria-labelledby="message">
                        <p class="red">You have 4 Mails</p>
                        <a class="dropdown-item media" href="#">
                           <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                           <div class="message media-body">
                              <span class="name float-left">Jonathan Smith</span>
                              <span class="time float-right">Just now</span>
                              <p>Hello, this is an example msg</p>
                           </div>
                        </a>
                        <a class="dropdown-item media" href="#">
                           <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                           <div class="message media-body">
                              <span class="name float-left">Jack Sanders</span>
                              <span class="time float-right">5 minutes ago</span>
                              <p>Lorem ipsum dolor sit amet, consectetur</p>
                           </div>
                        </a>
                        <a class="dropdown-item media" href="#">
                           <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                           <div class="message media-body">
                              <span class="name float-left">Cheryl Wheeler</span>
                              <span class="time float-right">10 minutes ago</span>
                              <p>Hello, this is an example msg</p>
                           </div>
                        </a>
                        <a class="dropdown-item media" href="#">
                           <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                           <div class="message media-body">
                              <span class="name float-left">Rachel Santos</span>
                              <span class="time float-right">15 minutes ago</span>
                              <p>Lorem ipsum dolor sit amet, consectetur</p>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>

               <div class="user-area dropdown float-right">
                  <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                  </a>

                  <div class="user-menu dropdown-menu">
                     <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                     <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                     <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                     <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                  </div>
               </div>

            </div>
         </div>
      </header>
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
                           <div class="stat-icon dib flat-color-1">
                              <i class="pe-7s-cash"></i>
                           </div>
                           <div class="stat-content">
                              <div class="text-left dib">
                                 <div class="stat-text">$<span class="count">23569</span></div>
                                 <div class="stat-heading">Revenue</div>
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
                           <div class="stat-icon dib flat-color-2">
                              <i class="pe-7s-cart"></i>
                           </div>
                           <div class="stat-content">
                              <div class="text-left dib">
                                 <div class="stat-text"><span class="count">3435</span></div>
                                 <div class="stat-heading">Sales</div>
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
                                 <div class="stat-text"><span class="count">349</span></div>
                                 <div class="stat-heading">Templates</div>
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
                                 <div class="stat-text"><span class="count">2986</span></div>
                                 <div class="stat-heading">Clients</div>
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
                              <!-- <canvas id="TrafficChart"></canvas>   -->
                              <div id="traffic-chart" class="traffic-chart"></div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="card-body">
                              <div class="progress-box progress-1">
                                 <h4 class="por-title">Visits</h4>
                                 <div class="por-txt">96,930 Users (40%)</div>
                                 <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                              </div>
                              <div class="progress-box progress-2">
                                 <h4 class="por-title">Bounce Rate</h4>
                                 <div class="por-txt">3,220 Users (24%)</div>
                                 <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: 24%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                              </div>
                              <div class="progress-box progress-2">
                                 <h4 class="por-title">Unique Visitors</h4>
                                 <div class="por-txt">29,658 Users (60%)</div>
                                 <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                              </div>
                              <div class="progress-box progress-2">
                                 <h4 class="por-title">Targeted Visitors</h4>
                                 <div class="por-txt">99,658 Users (90%)</div>
                                 <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
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
                           <h4 class="box-title">Orders </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">Avatar</th>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Product</th>
                                       <th>Quantity</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td class="serial">1.</td>
                                       <td class="avatar">
                                          <div class="round-img">
                                             <a href="#"><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                                          </div>
                                       </td>
                                       <td> #5469 </td>
                                       <td> <span class="name">Louis Stanley</span> </td>
                                       <td> <span class="product">iMax</span> </td>
                                       <td><span class="count">231</span></td>
                                       <td>
                                          <span class="badge badge-complete">Complete</span>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="serial">2.</td>
                                       <td class="avatar">
                                          <div class="round-img">
                                             <a href="#"><img class="rounded-circle" src="images/avatar/2.jpg" alt=""></a>
                                          </div>
                                       </td>
                                       <td> #5468 </td>
                                       <td> <span class="name">Gregory Dixon</span> </td>
                                       <td> <span class="product">iPad</span> </td>
                                       <td><span class="count">250</span></td>
                                       <td>
                                          <span class="badge badge-complete">Complete</span>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="serial">3.</td>
                                       <td class="avatar">
                                          <div class="round-img">
                                             <a href="#"><img class="rounded-circle" src="images/avatar/3.jpg" alt=""></a>
                                          </div>
                                       </td>
                                       <td> #5467 </td>
                                       <td> <span class="name">Catherine Dixon</span> </td>
                                       <td> <span class="product">SSD</span> </td>
                                       <td><span class="count">250</span></td>
                                       <td>
                                          <span class="badge badge-complete">Complete</span>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="serial">4.</td>
                                       <td class="avatar">
                                          <div class="round-img">
                                             <a href="#"><img class="rounded-circle" src="images/avatar/4.jpg" alt=""></a>
                                          </div>
                                       </td>
                                       <td> #5466 </td>
                                       <td> <span class="name">Mary Silva</span> </td>
                                       <td> <span class="product">Magic Mouse</span> </td>
                                       <td><span class="count">250</span></td>
                                       <td>
                                          <span class="badge badge-pending">Pending</span>
                                       </td>
                                    </tr>
                                    <tr class=" pb-0">
                                       <td class="serial">5.</td>
                                       <td class="avatar pb-0">
                                          <div class="round-img">
                                             <a href="#"><img class="rounded-circle" src="images/avatar/6.jpg" alt=""></a>
                                          </div>
                                       </td>
                                       <td> #5465 </td>
                                       <td> <span class="name">Johnny Stephens</span> </td>
                                       <td> <span class="product">Monitor</span> </td>
                                       <td><span class="count">250</span></td>
                                       <td>
                                          <span class="badge badge-complete">Complete</span>
                                       </td>
                                    </tr>
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
            <!-- /#right-panel -->

            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/slick/slick.min.js"></script>

            <!-- Template Javascript -->
            <script src="js/main.js"></script>
</body>

</html>