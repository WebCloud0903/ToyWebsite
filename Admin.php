<?php
    session_start();
    ob_start();

    if(!isset($_SESSION['login'])){
        header("Location: Login.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin.php</title>

    <link rel="stylesheet" type="text/css" href="Admin.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
    body{
        background: url('./Image/9Headu-Web.jpg');
        background-size: auto;
    }
</style>
<body>
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" 
            data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="./Image/10Logo-toys.jpg"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="About.php">About us</a></li>
                <li><a href="Product.php">Product</a></li>
                <li><a href="Admin-Logout.php">Log Out</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="content">
       <div class="cover">
            <h2 id="title">Hello <?php if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
            } ?></h2>
            <div class="product-management">
                <button type="button" class="btn btn-primary"><a href="./Manage-the-product/Product-management.php">Product management</a></button>
            </div>

            <div class="product-management">
                <button type="button" class="btn btn-primary"><a href="./Manage-user-account/Account-management.php">User management</a></button>
            </div>

            <div class="product-management">
                <button type="button" class="btn btn-primary"><a href="./Manage-the-order/Order-management.php">Order management</a></button>
            </div>

            <div class="product-management">
                <button type="button" class="btn btn-primary"><a href="./Manage-shop/shop-management.php">Shop management</a></button>
            </div>

            <div class="product-management">
                <button type="button" class="btn btn-primary"><a href="./Manage-supplier/supplier-management.php">Supplier management</a></button>
            </div>

            <div class="product-management">
                <button type="button" class="btn btn-primary"><a href="./Manage-category/category-management.php">Category management</a></button>
            </div>
       </div>
    </div>
</body>
</html>