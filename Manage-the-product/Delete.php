<?php
    include_once("../connection.php");
?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>

<?php
    $sql = "Delete from product where Product_ID = '$id'";
    $qr = pg_query($conn, $sql);
    header("location: Product-management.php");
?>