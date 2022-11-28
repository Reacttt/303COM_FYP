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
   <title>E-Store | Update Category</title>

   <!-- Favicon -->
   <link href="images/favicon.png" rel="icon">

   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

   <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>
   @include('adminAuth')
   @include('panel')

   <div id="right-panel" class="right-panel">
      @include('adminHeader')

      <div class="breadcrumbs">
         <div class="breadcrumbs-inner">
            <div class="row m-0">
               <div class="col-sm-4">
                  <div class="page-header float-left">
                     <div class="page-title">
                        <h1><b>Update Category</b></h1>
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
                              @if($category->category_status != 0)
                              @php $active_product = DB::table('product')->where('category_id', $category->category_id)->where('product_status', 1)->count(); @endphp
                              <tr>
                                 <td>{{ $category->category_id }}</td>
                                 <td>
                                    <center><img height="100" width="150" src="/images/{{ $category->category_image }}"></center>
                                 </td>
                                 <td>{{ $category->category_name }}</td>
                                 <td>{{ $category->category_description }}</td>
                                 <td>{{ $active_product }} </td>
                                 <td>
                                    <a href="/findCategory/{{ $category->category_id }}">
                                       <center><button type="submit" class='btn btn-warning'>Update</button><br><br></center>
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
   </div><!-- /#right-panel -->

   <!-- Right Panel -->

</body>

</html>