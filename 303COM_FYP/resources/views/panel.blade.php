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

                    <li class="menu-title">Admin Controls</li><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list"></i>Category</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="/addCategory">Add Category</a></li>
                            <li><i class="fa fa-table"></i><a href="/updateCategory">Update Category</a></li>
                            <li><i class="fa fa-table"></i><a href="/deleteCategory">Delete Category</a></li>
                            <li><i class="fa fa-table"></i><a href="/restoreCategory">Restore Category</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list"></i>Product</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="/addProduct">Add Product</a></li>
                            <li><i class="fa fa-table"></i><a href="/updateProduct">Update Product</a></li>
                            <li><i class="fa fa-table"></i><a href="/updateStock">Update Stock</a></li>
                            <li><i class="fa fa-table"></i><a href="/deleteProduct">Delete Product</a></li>
                            <li><i class="fa fa-table"></i><a href="/restoreProduct">Restore Product</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list"></i>Order</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="/orderList/pendingPayment">Pending Payment</a></li>
                            <li><i class="fa fa-table"></i><a href="/orderList/pendingShipment">Pending Shipment</a></li>
                            <li><i class="fa fa-table"></i><a href="/orderList/pendingReceive">Pending Receive</a></li>
                            <li><i class="fa fa-table"></i><a href="/orderList/completed">Completed</a></li>
                            <li><i class="fa fa-table"></i><a href="/orderList/cancelled">Cancelled</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list"></i>User</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="/userList/active">Delete User</a></li>
                            <li><i class="fa fa-table"></i><a href="/userList/inactive">Restore User</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list"></i>Currency</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="/assetList/fiat">Fiat Currency</a></li>
                            <li><i class="fa fa-table"></i><a href="/assetList/crypto">Crypto Currency</a></li>
                        </ul>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
</body>