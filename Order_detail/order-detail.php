<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order-Detail-Management</title>
    <link rel="stylesheet" type="text/css"
    href="order-detail.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

    <?php
        include_once("../connection.php");
    ?>

    <nav class="nav navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" 
            data-toggle="collapse" data-target="#mynavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="../Image/10Logo-toys.jpg"></a>
        </div>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="nav navbar-nav">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../Product.php">Product</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mb-3" style="width: 560px">
        <table class="table table-striped" style="width: 500px">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Quantity Product</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                    }
                    $sql = "select * from order_detail where order_id = $id";
                    $qr = pg_query($conn, $sql);
                    while($row = pg_fetch_assoc($qr)){?>
                        <tr>
                            <td><?=$row['orderdetail_id']?></td>
                            <td><?=$row['order_id']?></td>   
                            <td><?=$row['product_id']?></td>
                            <td><?=$row['qty_product']?></td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>

        <div>
            <a href="../Manage-the-order/Order-management.php"><button type="button" class="btn btn-primary">Back</button></a>
        </div>

    
    </div>
</body>
</html>