<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update product</title>

    <style>

        body{
                background: url('../Image/Background-shoe-shop.jpg');
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
        $sql = "Select * from product where Product_ID = '$id'";
        $qr = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($qr);
    
        if(isset($_POST['update'])){
            $name = $_POST['name'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $img = $_POST['pro_img'];
            $detail = $_POST['pro_detail'];
            $status = $_POST['status'];

            if($name == ""){echo "<li style='color: white'>Enter the name of product, please!</li>";}

            if($quantity == ""){echo "<li style='color: white'>Enter quantity of the product, please!</li>";}

            if($price == ""){echo "<li style='color: white'>Enter price of the product, please!</li>";}

            if($status == ""){echo "<li style='color: white'>Enter state of the product, please!</li>";}

            if($name != "" && $quantity != "" && $price != "" && $status != ""){
                $sql = "Update product set Name='$name', Quantity=$quantity, Price=$price, Pro_img='$img',
                 Pro_detail='$detail', Status='$status' where Product_ID='$id'";
                $qr = mysqli_query($conn, $sql);
                header("location: Product-management.php");
            }
        }
    ?>

    <div class="add-info">
       <div class="cover">
            <form method="post" action="" class="form-update">
                <label>Name</label><input type="text" name="name" value="<?= $row['Name']?>"/><br><br>
                <label>Quantity</label><input type="text" name="quantity" value="<?= $row['Quantity']?>"/><br><br>
                <label>Price</label><input type="text" name="price" value="<?= $row['Price']?>"/><br><br>
                <label>Pro_img</label><input type="text" name="pro_img" value="<?= $row['Pro_img']?>"/><br><br>
                <label>Pro_detail</label><input type="text" name="pro_detail" value="<?= $row['Pro_detail']?>"/><br><br>
                <label>Status</label><input type="text" name="status" value="<?= $row['Status']?>"/><br><br>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </form>
       </div>
   </div>
</body>
</html>