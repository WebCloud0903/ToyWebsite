<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier-Management.php</title>
    <link rel="stylesheet" type="text/css"
    href="supplier-management.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

    <?php
        include_once("../connection.php");
        // $sql = "select * from product";
        // $re = mysqli_query($conn, $sql);


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
    <div class="container mb-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
    
                    <th scope="col"><a href="Add-supplier.php">Add</a></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "select * from public.supplier";
                    $qr = pg_query($conn, $sql);
                    while($row = pg_fetch_assoc($qr)){?>
                        <tr>
                            <td><?=$row['supplier_id']?></td>
                            <td><?=$row['name']?></td>   
                            <td><?=$row['address']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['phone']?></td>
                            <td><a href="Update-supplier.php?id=<?= $row['supplier_id'] ?>">Update</a> | <a href="Delete-supplier.php?id=<?= $row['supplier_id']?>">Delete</a></td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>

        <div>
            <a href="../Admin.php"><button type="button" class="btn btn-primary">Back</button></a>
        </div>

        <!-- <div class="btn-group">
            <a href="#"><button type="button" class="btn btn-primary" style="margin-left: 5px">Add new product</button></a>
            <a href="#"><button type="button" class="btn btn-primary" style="margin-left: 5px">Update</button></a>
            <a href="#"><button type="button" class="btn btn-primary" style="margin-left: 5px">Delete</button></a>
        </div> -->
    </div>
</body>
</html>