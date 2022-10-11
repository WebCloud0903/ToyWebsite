<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product.php</title>
    <link rel="stylesheet" type="text/css"
    href="Product.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     
</head>
<body>
   <div class="container-fluid">
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
                    <li><a href="About.php">About us</a></li>
                    <li><a href="Cart.php">Cart <i class="fas fa-cart-plus"></i></a></li>
                </ul>

                <form class="navbar-form navbar-left" action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                    </div>
                    <button type="submit" class="btn btn-default" name="btn-search"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </nav>

        <?php
            include_once("connection.php");
            if(isset($_POST['btn-search'])){
                $search = $_POST['search'];

                if($search == ""){
                    echo "Please, enter to search";
                }
                else{
                    $sql = "Select * from product where Name like '%$search%'";
                    $qr = pg_query($conn, $sql);
                    $count = pg_num_rows($qr);

                    if($count <= 0){
                        echo "Don't find with key: ". $search;
                    }
                    else{ ?>
                        
                       <div style="background-color: white; width: 18%; text-align: center;">
                            <?php echo "Found ". $count. " product with ". $search. " key"; ?>
                       </div><br>

                        
                        <div class="row">
                            <?php
                                while($row = pg_fetch_assoc($qr)) { 
                            ?>
                                <div class="col-md-3">
                                    <form class="card" method="post" action="">
                                        <img
                                        src="./Image/<?=$row['Pro_img']?>" class="card-img-top" alt="Product1>" name="img"/>
                                        <div class="card-body">
                                        <a href="ProductDetail.php?name=<?=$row['Name']?>" 
                                        class="text-decoration-none"><h5 class="name-shoe"><?=$row['Name']?></h5></a>
                                        <h6 class="card-subtitle mb-2 price"><span>&#8363;</span><?=$row['Price']?></h6>
                                        <input type="number" class="quantity" name="qty"/>
                                        <button type="submit" class="btn btn-primary" id="btn" name="addcart"><a href="Cart.php?id=<?=$row['Product_ID']?>">Add to Cart</a></button>
                                        </div>
                                    </form><br>
                                </div>
                            <?php } ?>
                        </div>
             <?php  } ?>
             <?php   }
                
            }
        ?>

        <div>
            <h2 style="color: red;">All Products</h2>
        </div>

       <div class="row">

            <?php
                include_once("connection.php");
                $sql = "Select * from product";
                $qr = pg_query($conn, $sql);
                while($row = pg_fetch_assoc($qr)) { ?>

            <div class="col-md-3">
                <form class="card" method="post" action="">
                    <img
                    src="./Image/<?=$row['Pro_img']?>" class="card-img-top" alt="Product1>" name="img"/>
                    <div class="card-body">
                    <a href="ProductDetail.php?name=<?=$row['Name']?>"
                     class="text-decoration-none"><h5 class="name-shoe"><?=$row['Name']?></h5></a>
                    <h6 class="card-subtitle mb-2 price"><span>&#8363;</span><?=$row['Price']?></h6>
                    <input type="number" class="quantity" name="qty"/>
                    <button type="submit" class="btn btn-primary" id="btn" name="addcart"><a href="Cart.php?id=<?=$row['Product_ID']?>">Add to Cart</a></button>
                    </div>
                </form>
            </div>
            <?php } ?>
       </div>
        


    </div>
</body>
</html>