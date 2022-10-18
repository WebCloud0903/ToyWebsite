<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update product</title>

    <style>

        body{
                background: url('../Image/9Headu-Web.jpg');
            }
        .add-info{
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2;
        }
        .cover{
            background: rgba(0, 0, 0, 0.8);
            box-shadow: 2px 2px 17px 10px rgb(255 255 255 / 80%);
            width: 300px;
            height: 300px;
        }
        .form-update{
            margin-top: 20px;
        }
        label{
            color: white;
            margin-left: 20px;
        }
        input{
            margin-left: 20px;
        }
        .btn{
            margin-left: 100px;
            width: 100px;
        }


    </style>
</head>
<body>

    <?php
        include_once("../connection.php");
    ?>

    <?php
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }
    ?>
 
    <?php
        $sql = "Select * from product where id = '$id'";
        $qr = pg_query($conn, $sql);
        $row = pg_fetch_assoc($qr);
    
        if(isset($_POST['update'])){
            $name = $_POST['name'];
            $quantity = $_POST['quantity'];
            $Oprice = $_POST['original_price'];
            $Sprice = $_POST['sale_price'];
            $img = $_POST['pro_img'];
            $status = $_POST['status'];

            if($name == ""){echo "<li style='color: white'>Enter the name of product, please!</li>";}

            if($quantity == ""){echo "<li style='color: white'>Enter quantity of the product, please!</li>";}

            if($Oprice == ""){echo "<li style='color: white'>Enter original price of the product, please!</li>";}
            if($Sprice == ""){echo "<li style='color: white'>Enter sale price of the product, please!</li>";}


            if($status == ""){echo "<li style='color: white'>Enter state of the product, please!</li>";}

            if($name != "" && $quantity != "" && $Oprice != "" && $Sprice != "" && $status != ""){
                $sql = "Update product set name='$name', quantity=$quantity, original_price=$Oprice, sale_price=$Sprice,
                pro_image='$img', status='$status' where id='$id'";
                $qr = pg_query($conn, $sql);
                header("location: Product-management.php");
            }
        }
    ?>

    <div class="add-info">
       <div class="cover">
            <form method="post" action="" class="form-update">
                <label>Name</label><input type="text" name="name" value="<?= $row['Name']?>"/><br><br>
                <label>Quantity</label><input type="text" name="quantity" value="<?= $row['Quantity']?>"/><br><br>
                <label>Price</label><input type="text" name="original_price" value="<?= $row['original_price']?>"/><br><br>
                <label>Price</label><input type="text" name="sale_price" value="<?= $row['sale_price']?>"/><br><br>
                <label>Pro_img</label><input type="text" name="pro_img" value="<?= $row['pro_image']?>"/><br><br>
                <!-- <label>Pro_detail</label><input type="text" name="pro_detail" value="<?= $row['Pro_detail']?>"/><br><br> -->
                <label>Status</label><input type="text" name="status" value="<?= $row['status']?>"/><br><br>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </form>
       </div>
   </div>
</body>
</html>