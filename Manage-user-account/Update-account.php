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
        $sql = "Select * from customer where Username = '$user '";
        $qr = pg_query($conn, $sql);
        $row = pg_fetch_array($qr);
    ?>

    <?php
        if(isset($_POST['update'])){
            $uname = $_POST['username'];
            $pwd = md5($_POST['password']);
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['telephone'];
            $gender = $_POST['gender'];
            $birthday = $_POST['birthday'];
            $type = $_POST['type'];

            if(!empty($uname) && !empty($pwd) && !empty($fullname) && !empty($email) && !empty($address) && !empty($phone)
               && !empty($gender) && !empty($birthday) && !empty($type)){
                $sql = "Update customer set Username='$uname', Password='$pwd', Fullname='$fullname', Email='$email',
                        Address='$address', Telephone='$phone', Gender='$gender', Birthday='$birthday', Type='$type' 
                        where Username = '$user'";
                $qr = pg_query($conn, $sql);
                header("Location: Account-management.php");
            }
        }
    ?>
    

    <div class="add-info">
       <div class="cover">
            <form method="post" action="" class="form-update">
                <label>Username</label><input type="text" name="username" value="<?=$row['Username']?>"/><br><br>
                <label>Password</label><input type="text" name="password" value="<?=$row['Password']?>"/><br><br>
                <label>Fullname</label><input type="text" name="fullname" value="<?=$row['Fullname']?>"/><br><br>
                <label>Email</label><input type="text" name="email" value="<?=$row['Email']?>"/><br><br>
                <label>Address</label><input type="text" name="address" value="<?=$row['Address']?>"/><br><br>
                <label>Telephone</label><input type="text" name="telephone" value="<?=$row['Telephone']?>"/><br><br>
                <div>
                    <label>Gender:</label><input type="text" name="gender" value="<?=$row['Gender']?>"></input>
                </div><br>
                <label>Birthday</label><input type="text" name="birthday" value="<?=$row['Birthday']?>"/><br><br>
                <label>Type</label><input type="text" name="type" value="<?=$row['Type']?>"/><br><br>

                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </form>
       </div>
   </div>
</body>
</html>