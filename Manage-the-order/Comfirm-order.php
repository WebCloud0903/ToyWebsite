<?php
    include_once("../connection.php")
?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        // $confirm = 'Delivery';
        $sql = "Update orders set Status = 'Delivery' , DeliveryDate = CURDATE() where Order_ID = $id";
        $qr = mysqli_query($conn, $sql);
        header("Location: Order-management.php");
    }
?>

<?php
    // $confirm = 'Delivery';
    // $sql = "Update orders set Status = '$confirm' and DeliveryDate = CURDATE() where Order_ID = $id";
    // $qr = mysqli_query($conn, $sql);
    // header("Location: Order-management.php");
?>