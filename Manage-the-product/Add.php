<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>

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
        height: 400px;
    }
    .form-add{
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
        if(isset($_POST['add'])){
            $id = $_POST['Product_ID'];
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

            if($id != "" && $name != "" && $quantity != "" && $price != "" && $status != ""){
                $sql = "Insert into product(Product_ID, Name, Quantity, Price, Pro_img, Pro_detail, Status) 
                values('$id', '$name', $quantity, $price, '$img', '$detail', '$status')";
                $qr = pg_query($conn, $sql);
                header("location: Product-management.php");
            }
            
        }
    ?>

   <div class="add-info">
       <div class="cover">
            <form method="post" action="" class="form-add">
                <label>Product_ID</label><input type="text" name="Product_ID"/><br><br>
                <label>Name</label><input type="text" name="name"/><br><br>
                <label>Quantity</label><input type="text" name="quantity"/><br><br>
                <label>Price</label><input type="text" name="price"/><br><br>
                <label>Pro_img</label><input type="text" name="pro_img"/><br><br>
                <label>Pro_detail</label><input type="text" name="pro_detail"/><br><br>
                <label>Status</label><input type="text" name="status"/><br><br>
                <button type="submit" class="btn btn-primary" name="add">Add</button>
            </form>
       </div>
   </div>
</body>
</html>
