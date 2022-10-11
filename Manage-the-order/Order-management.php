<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order-Management.php</title>
    <link rel="stylesheet" type="text/css"
    href="Order-management.css">

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
            <a class="navbar-brand" href="#"><img src="../Image/shoeLogo.webp"></a>
        </div>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="nav navbar-nav">
                <li><a href="../Home.php">Home</a></li>
                <li><a href="../Product.php">Product</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mb-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Order_ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">OrderDate</th>
                    <th scope="col">DeliveryDate</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Function</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "select * from orders";
                    $qr = pg_query($conn, $sql);
                    while($row = pg_fetch_assoc($qr)){?>
                        <tr>
                            <td><?=$row['Order_ID']?></td>
                            <td><?=$row['Username']?></td>   
                            <td><?=$row['OrderDate']?></td>
                            <td><?=$row['DeliveryDate']?></td>
                            <td><?=$row['Payment']?></td>
                            <td><?=$row['Address']?></td>
                            <td><?=$row['Status']?></td>
                            <td><a href="Comfirm-order.php?id=<?=$row['Order_ID']?>">Confirm</a> |
                             <a href="Delete-order.php?id=<?=$row['Order_ID']?>">Delete</a></td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>

        <div>
            <a href="../Admin.php"><button type="button" class="btn btn-primary">Back</button></a>
        </div>

    
    </div>
</body>
</html>