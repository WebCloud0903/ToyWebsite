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
        margin-left: 41px;
    }

</style>
<body>

    <?php
        include_once("../connection.php");
    ?>

   

    <div class="container mb-3">
    <div class="cover" style="margin-left:430px">
            <form method="post" action="" class="form-add">
                <div><label style="color: white">Enter Month</label></div><input type="text" name="month"/><br><br>
                <button type="submit" class="btn btn-primary" name="OK">OK</button>
                <button class="btn btn-primary" name="Back" style="margin-left: 0px;"><a href="./Order-management.php">Back</button>

                <?php
                    if(isset($_POST['OK'])){
                        $month = $_POST['month'];

                        if($month > 0 && $month < 13){
                            $sql = "select Count(order_id) as total from orders where extract(Month from orderdate) = $month";
                            $re = pg_query($conn, $sql);
                            $n = pg_fetch_assoc($re);
                            $k = $n['total'];

                            ?> 
                                 <div class ="total"><h3><?=$k?> Orders</h3></div>                   
                            <?php
                        }
                        else{
                            ?>
                                <div><h3>Please, enter the month from 1 to 12!</h3></div>
                            <?php
                        }

                        
                    }
                ?>
            </form>
       </div>
    </div>
</body>
</html>