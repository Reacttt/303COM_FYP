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
         <!-- /.content -->
         <div class="col-lg-6">
            <div class="card">
               <div class="card-header">
                  <strong>Add Product</strong>
               </div>
               <div class="card-body card-block">
                  <form action="{{route('addProduct')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"><input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Product Category</label></div>
                        <div class="col-12 col-md-9">
                           <select name="category_id" class="form-control">
                              <option value="1">Category #1</option>
                              <option value="2">Category #2</option>
                              <option value="3">Category #3</option>
                           </select>
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Name</label></div>
                        <div class="col-12 col-md-9"><input type="text" name="product_name" placeholder="Text" class="form-control" value="{{old('product_name')}}">
                           @error('product_name')
                           <small>
                              {{ $message }}
                           </small>
                           @enderror
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Product Description</label></div>
                        <div class="col-12 col-md-9"><textarea name="product_description" rows="4" placeholder="Content..." class="form-control" value="{{old('product_description')}}"></textarea>
                           @error('product_description')
                           <small>
                              {{ $message }}
                           </small>
                           @enderror
                        </div>
                     </div>
                     <!-- Change to Slider -->
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Price</label></div>
                        <div class="col-12 col-md-9"><input type="number" name="product_price" placeholder="0" class="form-control" value="{{old('product_price')}}">
                           @error('product_price')
                           <small>
                              {{ $message }}
                           </small>
                           @enderror
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Stock</label></div>
                        <div class="col-12 col-md-9"><input type="number" name="product_stock" placeholder="0" class="form-control" value="{{old('user_stock')}}">
                           @error('product_stock')
                           <small>
                              {{ $message }}
                           </small>
                           @enderror
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Product images</label></div>
                        <div class="col-12 col-md-9"><input type="file" name="product_image" class="form-control-file" value="{{old('product_image')}}">
                           @error('product_image')
                           <small>
                              {{ $message }}
                           </small>
                           @enderror
                        </div>
                     </div>
                     <input type="hidden" class="form-control" name="product_status" value="1">
                     <div>
                        <button type="submit" class="btn btn-lg btn-info btn-block">
                           <span>Add Product</span>
                        </button>
                     </div>
                  </form>
               </div>
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