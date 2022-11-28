<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>E-Store | Edit Product</title>

   <!-- Favicon -->
   <link href="images/favicon.png" rel="icon">

</head>

<body>

   @include('adminAuth')
   @include('panel')

   <div id="right-panel" class="right-panel">
      @include('adminHeader')

      <!-- Content -->
      <div class="content">
         <!-- /.content -->
         <div class="col-lg-6">
            <div class="card">
               <div class="card-header">
                  <strong>Edit Product</strong>
               </div>
               <div class="card-body card-block">
                  <form action="{{route('updateProductDetails')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                     @csrf
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Image</label></div>
                        <img class="center" width="150" height="150" src="/images/{{ $product->product_image }}" alt="">
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product ID</label></div>
                        <div class="col-12 col-md-9"><input type="text" name="product_id" placeholder="Text" class="form-control" value="{{ $product->product_id }}" readonly>
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Product Category</label></div>
                        <div class="col-12 col-md-9">
                           <select name="category_id" class="form-control">
                              <option value="{{ $product->category_id }}">{{ $product->category_id }} - {{ $category_name }}</option>
                              <option disabled>----------------------------------------</option>
                              @foreach ($category as $category)
                              <option value="{{ $category->category_id }}">{{ $category->category_id }} - {{ $category->category_name }}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Name</label></div>
                        <div class="col-12 col-md-9"><input type="text" name="product_name" placeholder="Text" class="form-control" value="{{ $product->product_name }}">
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Product Description</label></div>
                        <div class="col-12 col-md-9"><textarea name="product_description" rows="4" placeholder="Content..." class="form-control"> {{ $product->product_description }} </textarea>
                        </div>
                     </div>
                     <!-- Change to Slider -->
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Price (MYR)</label></div>
                        <div class="col-12 col-md-9"><input type="number" name="product_price" placeholder="0" class="form-control" value="{{ $product->product_price }}">
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Stock</label></div>
                        <div class="col-12 col-md-9"><input type="number" name="product_stock" placeholder="0" class="form-control" value="{{ $product->product_stock }}" readonly>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-lg btn-info btn-block">
                        <span>Update Product</span>
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
</body>

</html>