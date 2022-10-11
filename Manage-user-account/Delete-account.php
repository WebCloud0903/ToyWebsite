<?php
    include_once("../connection.php");
?>

<?php
    if(isset($_GET['user'])){
        $user = $_GET['user'];
    }
?>

<?php
    $sql = "Delete from customer where Username = '$user'";
    $qr = pg_query($conn, $sql);
    header("Location: Account-management.php");
?>