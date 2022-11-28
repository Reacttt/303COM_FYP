<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>E-Store | Edit Category</title>

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
                  <strong>Edit Category</strong>
               </div>
               <div class="card-body card-block">
                  <form action="{{route('updateCategoryDetails')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                     @csrf
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category Image</label></div>
                        <img class="center" width="150" height="100" src="/images/{{ $category->category_image }}" alt="">
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category ID</label></div>
                        <div class="col-12 col-md-9"><input type="text" name="category_id" placeholder="Text" class="form-control" value="{{ $category->category_id }}" readonly>
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category Name</label></div>
                        <div class="col-12 col-md-9"><input type="text" name="category_name" placeholder="Text" class="form-control" value="{{ $category->category_name }}">
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Category Description</label></div>
                        <div class="col-12 col-md-9"><textarea name="category_description" rows="4" placeholder="Content..." class="form-control"> {{ $category->category_description }} </textarea>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-lg btn-info btn-block">
                        <span>Update Category</span>
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