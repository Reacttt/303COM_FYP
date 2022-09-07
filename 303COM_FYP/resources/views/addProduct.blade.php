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
                        <div class="col-12 col-md-9"><input type="number" name="product_stock" placeholder="0" class="form-control" value="{{old('product_stock')}}">
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
         </div>
      </div>
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