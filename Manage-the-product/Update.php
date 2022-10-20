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
            width: 220px;
            height: 517px;
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
            margin-left: 60px;
            width: 100px;
        }
        select{
            margin-left: 20px;
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
        $sql = "Select * from public.product where id = '$id'";
        $qr = pg_query($conn, $sql);
        $row = pg_fetch_assoc($qr);
    
        if(isset($_POST['update'])){
            $name = $_POST['name'];
            $quantity = $_POST['quantity'];
            $Oprice = $_POST['original_price'];
            $Sprice = $_POST['sale_price'];
            $img = $_POST['pro_img'];
            $status = $_POST['status'];
            $shop = $_POST['shop'];
            $supplier = $_POST['supplier'];
            $category = $_POST['category'];


            if($name == ""){echo "<li style='color: white'>Enter the name of product, please!</li>";}

            if($quantity == ""){echo "<li style='color: white'>Enter quantity of the product, please!</li>";}

            if($Oprice == ""){echo "<li style='color: white'>Enter original price of the product, please!</li>";}
            if($Sprice == ""){echo "<li style='color: white'>Enter sale price of the product, please!</li>";}


            if($status == ""){echo "<li style='color: white'>Enter state of the product, please!</li>";}

            if($name != "" && $quantity != "" && $Oprice != "" && $Sprice != "" && $status != ""){
                $sql = "Update public.product set name='$name', quantity=$quantity, original_price=$Oprice, sale_price=$Sprice,
                pro_image='$img', status='$status', category_id = $shop, supplier_id = $supplier, shop_id = $shop where id='$id'";
                $qr = pg_query($conn, $sql);
                header("location: Product-management.php");
            }
        }
    ?>

    <?php
        $pg = "select * from shop";
        $n = pg_query($conn, $pg);
    ?>
    <?php
        $sup = "select * from supplier";
        $per = pg_query($conn, $sup);
    ?>
    <?php
        $cate = "select * from public.category";
        $ca = pg_query($conn, $cate);
    ?>

    <div class="add-info">
       <div class="cover">
            <form method="post" action="" class="form-update">
                <div><label>Name</label></div><input type="text" name="name" value="<?= $row['name']?>"/><br><br>
                <div><label>Quantity</label></div><input type="text"  name="quantity" value="<?= $row['quantity']?>"/><br><br>
                <div><label>Original Price</label></div><input type="text" name="original_price" value="<?= $row['original_price']?>"/><br><br>
                <div><label>Sale Price</label></div><input type="text"  name="sale_price" value="<?= $row['sale_price']?>"/><br><br>
              
                <div><label>Pro_img</label></div><input type="file"  name="pro_img" value=""/><br><br>
              
                <div><label>Shop ID</label></div><select name="shop"><?php
                    while($ro = pg_fetch_assoc($n)){?>
                            <option  value="<?=$ro['shop_id']?>"><?=$ro['name']?></option>
                    <?php } ?>
                </select></br> 

                <div><label>Supplier ID</label></div><select name="supplier"><?php
                    while($su = pg_fetch_assoc($per)){?>
                            <option  value="<?=$su['supplier_id']?>"><?=$su['name']?></option>
                    <?php } ?>
                </select></br>  
                
                <div><label>Category ID</label></div><select name="category"><?php
                    while($category = pg_fetch_assoc($ca)){?>
                            <option  value="<?=$category['id']?>"><?=$category['name']?></option>
                    <?php } ?>
                </select></br>  
                
                <div><label>Status</label></div><input type="text" name="status" value="<?= $row['status']?>"/><br><br>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </form>
       </div>
   </div>
</body>
</html>