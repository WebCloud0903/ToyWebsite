<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop-Management.php</title>
    <link rel="stylesheet" type="text/css"
    href="shop-management.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
    form{
        max-width: 170px;
        height: 150px;
        background: rgba(0, 0, 0, 0.8);
        flex-grow: 1;
        padding: 30px 30px 40px;
        box-shadow: 2px 2px 17px 10px rgba(255, 255, 255, 0.8);
    }
    button{
        margin-left: 15px;
    }
    input{
        width: 80px;        
    }
    .mess{
        background: rgba(0, 0, 0, 0.8);
        flex-grow: 1;
        padding: 9px 10px 6px;
        box-shadow: 2px 2px 17px 10px rgba(255, 255, 255, 0.8);
        color: white;
        width: 426px;
    }
</style>
<body>

    <?php
        include_once("../connection.php");
    ?>
          
    <div class="container mb-3">
        <form method="post">
            <!-- <div><label style="color: white">Enter Month</label></div><input type="number" name="month"/><br><br> -->
            <div><label style="color: white">Enter Month</label></div><select name="month">
                <option value="">Choose Month</option> 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>    
                <option value="5">5</option> 
                <option value="6">6</option> 
                <option value="7">7</option> 
                <option value="8">8</option> 
                <option value="9">9</option> 
                <option value="10">10</option> 
                <option value="11">11</option> 
                <option value="12">12</option> 
            </select><br><br>
            <button type="submit" class="btn btn-primary" name="OK">OK</button>
        </form><br>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Times Sold</th>
                    <th scope="col">Name Shop</th>
                    <th scope="col">Function</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $m = 0;
                if(isset($_POST['OK'])){
                    $month = $_POST['month'];
                    
                    $m = $month;
                    $sql = "select count(sh.name) as num, sh.name as name, sh.shop_id from public.shop sh, public.order_detail od,
                        public.product p, public.orders o
                        where sh.shop_id = p.shop_id and p.id = od.product_id and od.order_id = o.order_id 
                        and o.orderdate in (select orderdate from orders where extract(month from o.orderdate) = $m)
                        group by sh.shop_id";
                    $qr = pg_query($conn, $sql);
                        
                    if($n = pg_num_rows($qr) > 0){
                        while($row = pg_fetch_assoc($qr)){?>
                            <tr>
                                <td><?=$row['num']?></td>
                                <td><?=$row['name']?></td>   
                                <td><a href="Revenue-detail.php?id=<?= $row['shop_id'] ?>">Detail</a>
                            </tr>
                        <?php }  
                    }
                    else{?>
                        <div ><h3 class="mess">This month have not data!</h3></div>
                   <?php } 
                }?>  
            </tbody>

        </table>
        <div>
            <a href="./shop-management.php"><button type="button" class="btn btn-primary">Back</button></a>
        </div>
    </div>
</body>
</html>