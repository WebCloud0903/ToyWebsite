<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up.php</title>
    <link rel="stylesheet" type="text/css"
    href="SignUp.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <?php
        include_once("connection.php");
    ?>

    <?php
    if(isset($_POST['btn-sign-up'])){
        $uname = $_POST['username'];
        $email = $_POST['email'];
        
        $sql = "Select Username from customer where Username = '$uname'";
        $qr = pg_query($conn, $sql);

        $sql2 = "Select Email from customer where Email = '$email'";
        $re = pg_query($conn, $sql2);

        if(pg_num_rows($qr) > 0){
            echo "<script>alert ('Invalid user')</Script>";
        }
        else if(pg_num_rows($re)){
            echo "<script>alert ('Email already exist')</Script>";
        }
        else{
            $pwd = md5($_POST['password']);
            $confirmPwd = md5($_POST['confirmpassword']);
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $phone = $_POST['telephone'];
            $gender = $_POST['gender'];
            $birthday = $_POST['birthday'];
            $type = $_POST['type'];


            if(strlen($uname) > 20){
                echo "<script>alert('Please, enter username and must be smaller or equal 20 characters')</script>";
            }
            else if($confirmPwd != $pwd){
                echo "<script>alert('Confirm password incorrectly')</script>";
            }
            else if(strlen($fullname) > 20){
                echo "<script>alert('Please, enter fullname and must be smaller or equal 20 characters')</script>";
            }
            else if(strlen($phone) > 10 || strlen($phone) < 10){
                echo "<script>alert('Invalid telephone')</script>";
            }
            else if($gender == ""){
                echo "<script>alert('Please, enter gender')</script>";
            }
            else if($birthday == ""){
                echo "<script>alert('Please, enter birthday')</script>";
            }
            else{
                $sql = "Insert into customer(Username, Password, Fullname, Email, Address, Telephone, Gender, Birthday, Type)
                        Values('$uname', '$pwd', '$fullname', '$email', '$address', '$phone', '$gender', '$birthday', '$type')";
                $qr = pg_query($conn, $sql);
                header("Location: Login.php");
            }
        }
    }
    ?>

  

    <div id="wrap">
        <form id="form-signup" action="" method="post" class="was-validated" role="form" onsubmit="return check()">
            <h1 class="form-heading">Sign-Up form</h1>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label" style="color:white">Username(*)</label>
                <div class="col-sm-10">
                    <input type="text" name="username" id="username" class="form-control" required>
                    <div class="valid-feedback">Correct</div>
                    <div class="invalid-feedback">Wrong</div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-2 control-label" style="color:white">Password(*)</label>
                <div class="col-sm-10">
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label for="confirmpassword" class="col-sm-2 label-control" style="color:white">Confirm Password(*)</label>
                <div class="col-sm-10">
                    <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label for="fullname" class="col-sm-2 label-control" style="color:white">Full name(*)</label>
                <div class="col-sm-10">
                    <input type="text" name="fullname" id="fullname" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-sm-2 label-control" style="color:white">Email(*)</label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label for="address" class="col-sm-2 label-control" style="color:white">Address(*)</label>
                <div class="col-sm-10">
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label for="telephone" class="col-sm-2 label-control" style="color:white">Telephone(*)</label>
                <div class="col-sm-10">
                    <input type="text" name="telephone" id="telephone" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label for="gender" class="col-sm-2 control-label">Gender</label>
                <div class="col-sm-10">
                    <input type="radio" name="gender" id="gender" value="Male" required>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="gender" value="Female" required>
                    <label for="female">Female</label>
                </div>
            </div>

            <div class="form-group">
                <label for="birthday" class="col-sm-2 control-label">Birthday</label>
                <div class="col-sm-10">
                    <input type="date" name="birthday" id="birthday" required>
                </div>
            </div>

            <div class="form-group">
                <label for="birthday" class="col-sm-2 control-label">Type Account</label>
                <div class="col-sm-10">
                    <input type="text" name="type" id="type" value="User" readonly>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="form-submit" name="btn-sign-up" id="btn-sign-up">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>