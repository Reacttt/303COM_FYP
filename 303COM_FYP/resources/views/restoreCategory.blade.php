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

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
   <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
   <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/style.css">

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
                        <h1><b>Delete Category</b></h1>
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
                        <strong class="card-title">Active Products</strong>
                     </div>
                     <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Image</th>
                                 <th>Name</th>
                                 <th>Description</th>
                                 <th>Active Products</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($category as $category)
                              @if($category->category_status != 1)
                              @php $active_product = DB::table('product')->where('category_id', $category->category_id)->where('product_status', 1)->count(); @endphp
                              <tr>
                                 <td>{{ $category->category_id }}</td>
                                 <td>
                                    <center><img height="100" width="100" src="/images/{{ $category->category_image }}"></center>
                                 </td>
                                 <td>{{ $category->category_name }}</td>
                                 <td>{{ $category->category_description }}</td>
                                 <td>{{ $active_product }} </td>
                                 <td>
                                    <a href="/updateCategoryStatus/{{ $category->category_id }}/1">
                                       <center><button type="submit" class='btn btn-success'>Restore</button><br><br></center>
                                    </a>
                                 </td>
                              </tr>
                              @endif
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

   <!-- Scripts -->
   <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
   <script src="assets/js/main.js"></script>


   <script src="assets/js/lib/data-table/datatables.min.js"></script>
   <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
   <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
   <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
   <script src="assets/js/lib/data-table/jszip.min.js"></script>
   <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
   <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
   <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
   <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
   <script src="assets/js/init/datatables-init.js"></script>


   <script type="text/javascript">
      $(document).ready(function() {
         $('#bootstrap-data-table-export').DataTable();
      });
   </script>


</body>

</html>