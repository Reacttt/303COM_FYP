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
                        <h1><b>User List</b></h1>
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
                        @if ($filter == "active")
                        <strong class="card-title">Active User</strong>
                        @elseif ($filter == "inactive")
                        <strong class="card-title">Inactive User</strong>
                        @else
                        <strong class="card-title">All User</strong>
                        @endif
                     </div>
                     <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Username</th>
                                 <th>Email</th>
                                 <th>Creation Date</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($user as $user)
                              <tr>
                                 <td> {{ $user->user_id }} </td>
                                 <td> {{ $user->user_username }} </td>
                                 <td> {{ $user->user_email }} </td>
                                 <td> {{ $user->created_at }} </td>
                                 @if ($filter == "active")
                                 <td>
                                    <center>
                                       <a><button type="submit" class='btn btn-danger'>Delete User</button><br><br></a>
                                    </center>
                                 </td>
                                 @elseif ($filter == "inactive")
                                 <td>
                                    <center>
                                       <a><button type="submit" class='btn btn-success'>Restore User</button><br><br></a>
                                    </center>
                                 </td>
                                 @endif
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