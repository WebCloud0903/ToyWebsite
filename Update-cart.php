<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>

    <style>

    body{
        background: url('./Image/Background-shoe-shop.jpg');
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
        height: 100px;
    }
    .form-update{
        margin-top: 20px;
    }
    img{
        width: 250px;
        margin-left: 61px;
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
    .content{
        margin-left: 125px;
    }
    .quantity{
        width: 30px;
        margin-left: 120px;
        margin-bottom: 5px;
    }
    .btn{
        margin-left: 90px;
    }

    </style>
</head>
<body>
    
    <?php
        include_once("connection.php");
    ?>

    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
    ?>

    <?php
        $sql = "Select * from cart where Cart_ID = $id";
        $qr = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($qr);
    ?>

    <?php
        if(isset($_POST['update'])){
            $qty = $_POST['quantity'];
            $num = 1;

            if($qty == ""){
                echo "Please, enter quantity of product that you want to add!";
            }
            else if($qty < $num){
                echo "<script>alert('Quantity must be larger than 1!')</script>";
            }
            else{
                $sql = "Update cart set Quantity_Pro = $qty where Cart_ID = $id";
                $qr = mysqli_query($conn, $sql);
                header("Location: Cart.php");
            }
        }
    ?>

   <div class="add-info">
       <div class="cover">
            <form method="post" action="" class="form-update">
                <label class="content"><?=$row['Product_ID']?></label><br>
                <input type="number" class="quantity" name="quantity" value="<?=$row['Quantity_Pro']?>"/>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </form>
       </div>
   </div>
</body>
</html>
