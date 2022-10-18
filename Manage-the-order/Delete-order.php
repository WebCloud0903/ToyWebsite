<?php
    include_once("../connection.php");
?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>

<?php
    $sql = "Delete from orders where order_id = '$id'";
    $qr = pg_query($conn, $sql);
    header("location: Order-management.php");
?>