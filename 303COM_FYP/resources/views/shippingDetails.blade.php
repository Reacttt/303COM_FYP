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

@include('userAuth')
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
            <strong class="card-title">Shipping Details</strong>
         </div>
         <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Address Line 1</th>
                     <th>Address Line 2</th>
                     <th>City</th>
                     <th>Postal Code</th>
                     <th>Country</th>
                     <th>Contact</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($shipping_details as $details)
                  <tr>
                     <td> {{ $details->shipping_first_name }} </td>
                     <td> {{ $details->shipping_last_name }} </td>
                     <td> {{ $details->shipping_address_line1 }} </td>
                     <td> {{ $details->shipping_address_line2 }} </td>
                     <td> {{ $details->shipping_city }} </td>
                     <td> {{ $details->shipping_postal_code }} </td>
                     <td> {{ $details->shipping_country }} </td>
                     <td> {{ $details->shipping_contact }} </td>
                     <td>
                        <center>
                           <a href="/shippingDetailsForm/edit/{{ $details->shipping_details_id }}"><button type="submit" class='btn btn-warning'><i class="fa fa-edit"></i> Edit</button><br><br></a>
                           @if ($counts != 1)
                           <a href="/removeShippingDetails/{{ $details->shipping_details_id }}"><button type="submit" class='btn btn-danger'><i class="fa fa-trash"></i> Delete</button><br><br></a>
                           @endif
                        </center>
                     </td>
                  </tr>
                  @endforeach
                  <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>
                        <center>
                           <a href="/shippingDetailsForm/new"><button type="submit" class='btn btn-success'><i class="fa fa-plus"></i> Add</button><br><br></a>
                        </center>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</body>

@include('footer')

</html>