<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update account</title>

    <style>

        body{
                background: url('../Image/9Headu-Web.jpg');
                background-size: auto;
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
            height: 420px;
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
        if(isset($_GET["user"])){
            $user = $_GET["user"];
        }
    ?>

    <?php
        $sql = "Select * from public.account where username = '$user'";
        $qr = pg_query($conn, $sql);
        $row = pg_fetch_assoc($qr);
    ?>

    <?php
        if(isset($_POST['update'])){
            $uname = $_POST['username'];
            $pwd = md5($_POST['password']);
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['telephone'];
            $gender = $_POST['gender'];
            $type = $_POST['type'];

            if(!empty($uname) && !empty($pwd) && !empty($email) && !empty($address) && !empty($phone)
               && !empty($gender) && !empty($type)){
                $sql = "Update public.account set username='$uname', password='$pwd', email='$email',
                        address='$address', phone='$phone', gender='$gender', type='$type' 
                        where username = '$user'";
                $qr = pg_query($conn, $sql);
                header("Location: Account-management.php");
            }
        }
    ?>
    

    <div class="add-info">
       <div class="cover">
            <form method="post" action="" class="form-update">
                <label>Username</label><input type="text" name="username" value="<?=$row['username']?>"/><br><br>
                <label>Password</label><input type="text" name="password" value="<?=$row['password']?>"/><br><br>
               
                <label>Email</label><input type="text" name="email" value="<?=$row['email']?>"/><br><br>
                <label>Address</label><input type="text" name="address" value="<?=$row['address']?>"/><br><br>
                <label>Phone</label><input type="text" name="telephone" value="<?=$row['phone']?>"/><br><br>
                <div>
                    <label>Gender:</label><input type="text" name="gender" value="<?=$row['gender']?>"></input>
                </div><br>
            
                <label>Type</label><input type="text" name="type" value="<?=$row['type']?>"/><br><br>

                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </form>
       </div>
   </div>
</body>
</html>