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
    
    <link rel="stylesheet" href=<?php echo asset('css/panel.css') ?>>
</head>

<body>

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <!-- Start Dashboard -->
                    <li class="active">
                        <a href="/admin"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <!-- End Dashboard -->

                    <li class="menu-title">Category</li><!-- /.menu-title -->

                    <li class="menu-item">
                        <a href="/addCategory"> <i class="menu-icon fa fa-table"></i>Add New Category</a>
                        <a href="/updateCategory"> <i class="menu-icon fa fa-table"></i>Update Category Details</a>
                        <a href="/deleteCategory"> <i class="menu-icon fa fa-table"></i>Delete Category</a>
                        <a href="/restoreCategory"> <i class="menu-icon fa fa-table"></i>Restore Category</a>
                    </li>

                    <li class="menu-title">Product</li><!-- /.menu-title -->

                    <li class="menu-item">
                        <a href="/addProduct"> <i class="menu-icon fa fa-table"></i>Add New Product</a>
                        <a href="/updateProduct"> <i class="menu-icon fa fa-table"></i>Update Product Details</a>
                        <a href="/updateStock"> <i class="menu-icon fa fa-table"></i>Update Product Stock</a>
                        <a href="/deleteProduct"> <i class="menu-icon fa fa-table"></i>Delete Product</a>
                        <a href="/restoreProduct"> <i class="menu-icon fa fa-table"></i>Restore Product</a>
                    </li>

                    <li class="menu-title">Order</li><!-- /.menu-title -->


                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
</body>