<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>

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
        width: 375px;
        height: 450px;
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
        margin-top: 20px;
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
    $uname = $_POST['username'];
    $email = $_POST['email'];
    
    $sql = "Select username from account where username = '$uname'";
    $qr = pg_query($conn, $sql);

    $sql2 = "Select email from account where email = '$email'";
    $re = pg_query($conn, $sql2);

    if(pg_num_rows($qr) > 0){
        echo "<script>alert ('Invalid user')</Script>";
    }
    else if(pg_num_rows($re)){
        echo "<script>alert ('Email already exist')</Script>";
    }
    else{
        $pwd = $_POST['password'];
        $confirmPwd = $_POST['confirmpass'];
        $address = $_POST['address'];
        $telephone = $_POST['telephone'];
        $gender = $_POST['gender'];
        $type = $_POST['type'];


        if(strlen($uname) > 20){
            echo "<script>alert('Please, enter username and must be smaller or equal 20 characters')</script>";
        }
        else if($confirmPwd != $pwd){
            echo "<script>alert('Confirm password incorrectly')</script>";
        }
        else if(strlen($telephone) > 10 || strlen($telephone) < 10){
            echo "<script>alert('Invalid telephone')</script>";
        }
        else if($gender == ""){
            echo "<script>alert('Please, enter gender')</script>";
        }
        else{
            $sql = "Insert into account(username, password, email, address, phone, gender, type)
                    Values('$uname', '$pwd', '$email', '$address', '$telephone', '$gender', '$type')";
            $qr = pg_query($conn, $sql);
            header("Location: Account-management.php");
        }
    }
}
    //    if(isset($_POST['add'])){
    //        $user = $_POST['username'];
    //        $pwd = $_POST['password'];
    //        $confirmpass = $_POST['confirmpass'];
    //        $fname = $_POST['fullname'];
    //        $email = $_POST['email'];
    //        $address = $_POST['address'];
    //        $telephone = $_POST['telephone'];
    //        $gender = $_POST['gender'];
    //        $birthday = $_POST['birthday'];
    //        $type = $_POST['type'];

    //        if(empty($user)){}
    //    }
?>

   <div class="add-info">
       <div class="cover">
            <form method="post" action="" class="form-add">
                <label>Username</label><input type="text" name="username"/><br><br>
                <label>Password</label><input type="password" name="password"/><br><br>
                <label>Confirm Password</label><input type="password" name="confirmpass"/><br><br>
                <!-- <label>Fullname</label><input type="text" name="fullname"/><br><br> -->
                <label>Email</label><input type="email" name="email"/><br><br>
                <label>Address</label><input type="text" name="address"/><br><br>
                <label>Telephone</label><input type="text" name="telephone"/><br><br>
                <div>
                    <label for="gender" class="col-sm-2 control-label">Gender: </label>
                    <input type="radio" name="gender" id="gender" value="Male" required>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="gender" value="Female" required>
                    <label for="female">Female</label>
                </div><br>

                <!-- <label>Birthday</label><input type="date" name="birthday"/><br><br>
                <label>Type</label> -->
                <select style="margin-left: 43px" name="type">
                    <option value="Choose type">Choose type</option>
                    <option value="User" name="type">User</option>
                    <option value="Admin" name="type">Admin</option>
                </select>
                <button type="submit" class="btn btn-primary" name="add">Add</button>
            </form>
       </div>
   </div>
</body>
</html>
