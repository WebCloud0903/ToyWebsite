<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
    }

?>
<?php
    include_once("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revenue-detail.php</title>
    <!-- <link rel="stylesheet" type="text/css"
    href="shop-management.css"> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
    body{
        background: url('../Image/9Headu-Web.jpg');
    }
   .table{
        margin-top: 300px;
        width: 500px;
        margin-left: 570px;
        background-color: aliceblue;
   }
</style>
<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Total revenue of shop</th>
                <th scope="col">Name Shop</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $sql = "select sum(sale_price - original_price) as sum, sh.name as name from public.product as p, public.shop as sh
            where p.shop_id = sh.shop_id and sh.shop_id = $id group by sh.name";
            $re = pg_query($conn, $sql);
            while($row = pg_fetch_assoc($re)){?>
                <tr>
                    <td><?=$row['sum']?></td>
                    <td><?=$row['name']?></td>   
                </tr>
            <?php }  ?>   
        </tbody>
    </table>
    <div style="margin-left: 570px;">
        <a href="./BestShop.php"><button type="button" class="btn btn-primary">Back</button></a>
    </div>
</body>