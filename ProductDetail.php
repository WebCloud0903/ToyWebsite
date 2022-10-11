<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProductDetail.php</title>
    <link rel="stylesheet" type="text/css"
    href="ProductDetail.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" 
                    data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                        <a class="navbar-brand" href="Home.php"><img src="./Image/shoeLogo.webp"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="Product.php">Product</a></li>
                    </ul>
                </div>
            </nav>

            <div id="wrap">

                <?php
                    include_once("connection.php");

                    if(isset($_GET['name'])){
                        $name = $_GET['name'];
                    }
                ?>    

                <?php
                    $sql = "Select Name, Price, Pro_img, Pro_detail from product where Name = '$name'";
                    $qr = pg_query($conn, $sql);
                    $row = pg_fetch_assoc($qr);
                ?>

                <div class="total-detail">
                    <div class="detail">
                        <img src="./Image/<?=$row['Pro_img']?>">
                    </div>
                    <div class="detail-info">
                        <p class="name-img"><?=$row['Name']?></p>
                        <h4 class="price"><span>&#8363;</span><?=$row['Price']?></h4>
                        <P><?=$row['Pro_detail']?></P>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</body>
</html>