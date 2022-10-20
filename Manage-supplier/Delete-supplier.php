<?php
    include_once("../connection.php");
?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>

<?php
    $sql = "Delete from public.supplier where supplier_id = '$id'";
    $qr = pg_query($conn, $sql);
    header("location: supplier-management.php");
?>