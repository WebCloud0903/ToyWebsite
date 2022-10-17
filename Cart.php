
<?php
    // 1. Order -> Insert into a new order
    // => Order ID get
    //=> get Products in the cart  => insert into orderdetail
include_once("connection.php");
    session_start();

    if(isset($_SESSION['login'])){
        $user = $_SESSION['login'];
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "Select product_id from cart where username = '$user' and product_id = '$id'";
            $qr = pg_query($conn, $sql);

            if(pg_num_rows($qr) == 0){
                $query = "INSERT INTO cart(username, product_id, qty_pro, date)
                Values('$user', '$id', 1, CURDATE())";
            }
            else{
                $query = "UPDATE cart SET qty_pro =qty_pro  + 1 where username = '$user'
                and product_id = '$id'";
            }
            if(!pg_query($conn, $query)){
                echo "Error";
                // .mysqli_error($conn);
            }
        }

        $Select = "Select * from cart c, product p where c.product_id = p.id and username = '$user'";
        $re = pg_query($conn, $Select);
        $sum = 0;
    }
    else{
        header("Location: Login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart.php</title>
    <link rel="stylesheet" type="text/css"
    href="Cart.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     
</head>
<body>

    <div class="container-fluid">
        <div class="containetr">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" 
                    data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                        <a class="navbar-brand" href="index.php"><img src="./Image/shoeLogo.webp"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="Product.php">Product</a></li>
                    </ul>
                    <a href="Order.php" class="btn btn-primary" id="btn-order">Order</a>
                </div>
            </nav>

            <div class="row">
                
                <?php
                    while($row = pg_fetch_assoc($re)){?>

                    <div class="col-md-3">
                        <div class="card">
                            <img
                            src="./Image/<?=$row['pro_image']?>" class="card-img-top" alt="Product1"/>
                            <div class="card-body">
                                <!-- <a ></h5></a> -->
                                <h6 class="card-subtitle mb-2 price"><span>&#8363;</span><?=$row['sale_price'] * $row['qty_pro']?></h6>
                                <input type="number" class="quantity" name="quantity" value="<?=$row['qty_pro']?>" readonly/>
                                <a href="Update-cart.php?id=<?=$row['id']?>" class="btn btn-primary" id="btn-update">Update</a><br>
                                <!-- <a href="#" class="btn btn-primary" id="btn-order">Order</a> -->
                                <a href="Delete-cart.php?id=<?=$row['id']?>" class="btn btn-primary" id="btn-delete">Delete</a>
                            </div>
                        </div>
                    </div>

                    <?php 
                    $sum = $sum + $row['sale_price'] * $row['qty_pro']; 
                    ?>

                <?php } ?>
                
                <div id="total-price">
                    <div>Total: <span>&#8363;</span><?php echo $sum; ?> </div> 
                </div>
            </div>

        </div>

    </div>
</body>
</html>