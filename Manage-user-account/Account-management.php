<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage user account</title>
    <link rel="stylesheet" type="text/css" href="Account-management.css">

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
            <a class="navbar-brand" href="index.php"><img src="../Image/shoeLogo.webp"></a>
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
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Type</th>
                    <th scope="col" style="width: 150px;"><a href="Add-account.php">Add</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "select * from customer";
                    $qr = pg_query($conn, $sql);
                    while($row = pg_fetch_assoc($qr)){?>
                        <tr>
                            <td><?=$row['Username']?></td>
                            <td><?=md5($row['Password'])?></td>
                            <td><?=$row['Fullname']?></td>
                            <td><?=$row['Email']?></td>
                            <td><?=$row['Address']?></td>
                            <td><?=$row['Telephone']?></td>
                            <td><?=$row['Gender']?></td>
                            <td><?=$row['Birthday']?></td>
                            <td><?=$row['Type']?></td>
                            <td><a href="Update-account.php?user=<?=$row['Username']?>">Update</a>|
                            <a href="Delete-account.php?user=<?=$row['Username']?>">Delete</a></td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>

        <div>
            <a href="../Admin.php"><button type="button" class="btn btn-primary">Back</button></a>
        </div>
</body>
</html>