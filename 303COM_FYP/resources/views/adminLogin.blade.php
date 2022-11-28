<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>E-Store | Admin Login</title>

   <!-- Favicon -->
   <link href="images/favicon.png" rel="icon">

</head>

<body>
   <div id="right-panel" class="right-panel">
      @include('adminHeader')
   </div>

   <center>
      <!-- Content -->
      <div class="content">
         <!-- /.content -->
         <br><br><br>
         <div class="col-lg-5">
            <div class="card">
               <div class="card-header">
                  <strong>Admin Login</strong>
               </div>
               <div class="card-body card-block">
                  <form action="{{route('loginAdmin')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                     @csrf
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Admin Username</label></div>
                        <div class="col-12 col-md-9"><input type="text" name="admin_username" class="form-control" value="{{old('admin_username')}}">
                           @error('admin_username')
                           <small>
                              {{ $message }}
                           </small>
                           @enderror
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Admin Password</label></div>
                        <div class="col-12 col-md-9"><input type="password" name="admin_password" class="form-control" value="{{old('admin_password')}}">
                           @error('admin_password')
                           <small>
                              {{ $message }}
                           </small>
                           @enderror
                        </div>
                     </div>
                     <button type="submit" class="btn btn-lg btn-info btn-block">
                        <span>Admin Login</span>
                     </button>
               </div>
               </form>
            </div>
            <div class="clearfix"></div>
         </div>
      </div>
   </center>
   <!-- /#right-panel -->
</body>

</html>