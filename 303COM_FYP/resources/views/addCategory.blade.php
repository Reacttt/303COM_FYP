<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>E-Store | Add Category</title>

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
                  <strong>Add Category</strong>
               </div>
               <div class="card-body card-block">
                  <form action="{{route('addCategory')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                     @csrf
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category Name</label></div>
                        <div class="col-12 col-md-9"><input type="text" name="category_name" placeholder="Text" class="form-control" value="{{old('category_name')}}">
                           @error('category_name')
                           <small>
                              {{ $message }}
                           </small>
                           @enderror
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Category Description</label></div>
                        <div class="col-12 col-md-9"><textarea name="category_description" rows="4" placeholder="Content..." class="form-control" value="{{old('category_description')}}"></textarea>
                           @error('category_description')
                           <small>
                              {{ $message }}
                           </small>
                           @enderror
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Category Image</label></div>
                        <div class="col-12 col-md-9"><input type="file" name="category_image" class="form-control-file" value="{{old('category_image')}}">
                           @error('category_image')
                           <small>
                              {{ $message }}
                           </small>
                           @enderror
                        </div>
                     </div>
                     <input type="hidden" class="form-control" name="category_status" value="1">
                     <div>
                        <button type="submit" class="btn btn-lg btn-info btn-block">
                           <span>Add Category</span>
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