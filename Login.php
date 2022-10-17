<?php
    session_start();
    ob_start();
    include_once("connection.php");
    
    if(isset($_POST['login'])){
        $uname = $_POST['txtUsername'];
        $pwd = $_POST['txtPassword'];//md5
        

        $sql = "Select * from account where username='$uname' and password='$pwd'";
        $qr = pg_query($conn, $sql);
        $r = pg_fetch_row($qr);

        if(pg_num_rows($qr) > 0){
            if($r[6] == 'Admin'){
                $_SESSION['Admin'] = $r[0];
            }
            else if($r[6] == 'User'){
                $_SESSION['login'] = $r[0];
            }
            
            header("Location: index.php");
        }
        else{
            echo "<script>alert('Invalid username or password')</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login.php</title>
    <link rel="stylesheet" type="text/css"
    href="Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

    
    <div id="wrap">
        <form id="form-login" action="" method="post">
            <h1 class="form-heading">Login Form</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <div class="col-sm-12">
                    <input type="text" class="form-input" placeholder="Username" name="txtUsername" id="txtUsername" required>
                </div>
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <div class="col-sm-12">
                    <input type="password" class="form-input" placeholder="Password" name="txtPassword" id="txtPassword" required>
                </div>
            </div>
            <!-- <button type="submit" class="form-submit" name="btn-login">Login for Admin</button> -->
            <button type="submit" class="form-submit" name="login">Login </button>
        </form> 
    </div>
</body>
</html>