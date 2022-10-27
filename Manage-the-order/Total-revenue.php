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
<style>
    form{
        max-width: 245px;
        background: rgba(0, 0, 0, 0.8);
        flex-grow: 1;
        padding: 30px 30px 40px;
        box-shadow: 2px 2px 17px 10px rgba(255, 255, 255, 0.8);
    }
    button{
        margin-left: 36px;
    }
    a{
        color: white;
    }
    .total{
        margin-left: 20px;
    }
    label{
        margin-left: 50px;
    }
    

</style>
<body>

    <?php
        include_once("../connection.php");
    ?>

    

    <div class="container mb-3">
    <div class="cover" style="margin-left:430px">
            <form method="post" action="" class="form-add">
                <!-- <div><label style="color: white">Enter Month</label></div><input type="text" name="month"/><br><br> -->
                <div><label style="color: white">Enter Month</label></div><select name="month" style="margin-left: 34px">
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
                <button class="btn btn-primary" name="Back" style="margin-left: 0px;"><a href="./Order-management.php">Back</button>

                <?php
                if(isset($_POST['OK'])){
                    $month = $_POST['month'];

                        $sql = "select Sum(p.sale_price - p.original_price) as total from product p, order_detail od where od.product_id = p.id and od.orderdetail_id in (select orderdetail_id from order_detail od, orders o where 
                            od.order_id = o.order_id and extract(month from o.orderdate) = $month)";
                        $re = pg_query($conn, $sql);
                        $n = pg_fetch_assoc($re);
                        $k = $n['total'];

                        // echo "<script>alert($k + ' VND')</script>";
                            ?> 
                                <div class ="total"><h3><span>&#8363;</span><?=$k?></h3></div>                   
                            <?php
                   
                    
                }
            ?>
            </form>
       </div>
    </div>  
</body>
</html>