<?php
    include_once("connection.php");
?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>

<?php
    $sql = "Delete from cart where Cart_ID = $id";
    $qr = pg_query($conn, $sql);
    header("Location: Cart.php");
?>