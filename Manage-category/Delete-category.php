<?php
    include_once("../connection.php");
?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>

<?php
    $sql = "Delete from public.category where id = '$id'";
    $qr = pg_query($conn, $sql);
    header("location: category-management.php");
?>