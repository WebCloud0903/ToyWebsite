<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add supplier</title>

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
        height: 303px;
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
        if(isset($_POST['add'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];


            if($name == ""){echo "<li style='color: white'>Enter the name of supplier, please!</li>";}

            if($email == ""){echo "<li style='color: white'>Enter email of the supplier, please!</li>";}

            if($phone == ""){echo "<li style='color: white'>Enter phone of the supplier, please!</li>";}
            if($address == ""){echo "<li style='color: white'>Enter address of the supplier, please!</li>";}



            if($name != "" && $email != "" && $phone != "" && $address != ""){
                $sql = "Insert into public.supplier(name, email, phone, address) 
                values('$name', '$email', '$phone', '$address')";
                $qr = pg_query($conn, $sql);
                header("location: supplier-management.php");
            }
            
        }
    ?>


   <div class="add-info">
       <div class="cover">
            <form method="post" action="" class="form-add">
                <div><label>Name</label></div><input type="text" name="name"/><br><br>
                <div><label>Email</label></div><input type="email" name="email"/><br><br>
                <div><label>Phone</label></div><input type="text" name="phone"/><br><br>
                <div><label>Address</label></div><input type="text" name="address"/><br><br>

                <button type="submit" class="btn btn-primary" name="add">Add</button>
            </form>
       </div>
   </div>
</body>
</html>
