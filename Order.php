<?php

use function PHPSTORM_META\map;

    session_start();
    include_once("connection.php");

    if(isset($_SESSION['login'])){
        $user = $_SESSION['login'];

        $query = "Select Address from customer where Username = '$user'";
        $re = mysqli_query($conn, $query);
        $r = mysqli_fetch_assoc($re);
        $address = $r['Address'];

        //Get payment
        $sql5 = "Select SUM(Quantity_Pro * Price), Quantity_Pro, Price from cart c, product p where 
                 c.Product_ID = p.Product_ID and Username = '$user'";
        $k = mysqli_query($conn, $sql5);
        $row2 = mysqli_fetch_assoc($k);
        $payment = $row2['SUM(Quantity_Pro * Price)'];

        //Check cart and order
        $cart = "Select * from cart where Username = '$user'";
        $check = mysqli_query($conn, $cart);
        if(mysqli_fetch_assoc($check) > 0){
            $sql1 = "INSERT INTO `orders`(`Username`, `OrderDate`, `Payment`, `Address`) VALUES ('$user', CURDATE(), $payment, '$address')";
            $Perform = mysqli_query($conn, $sql1);
        }
        else{
            echo "<script>alert('No products to order!')</script>";
        }

        //Get ID of order that just add
        $add = "SELECT MAX(Order_ID) FROM orders";
        $qr = mysqli_query($conn, $add);
        $n = mysqli_fetch_assoc($qr);
        $orderid = $n['MAX(Order_ID)'];

        //Get ID of product
        $sql2 = "Select * from cart where Username = '$user'";
        $do = mysqli_query($conn, $sql2);

        //insert into order detail
        while($row = mysqli_fetch_assoc($do)){
            $a = "";
            $a = $row['Product_ID'];
            $qty_pro = $row['Quantity_Pro'];

            $sql4 = "INSERT INTO `orderdetail`(`Order_ID`, `Product_ID`, `Qty_pro`) VALUES ($orderid, '$a', $qty_pro)";
            $insert = mysqli_query($conn, $sql4);
        }

        echo "<script>alert('Order successfully')</script>";
        echo "<script>window.location = 'Home.php?status=order'</script>";


    }
?>
