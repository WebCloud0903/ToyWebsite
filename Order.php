<?php

use function PHPSTORM_META\map;

    session_start();
    include_once("connection.php");

    if(isset($_SESSION['login'])){
        $user = $_SESSION['login'];

        $query = "Select address from account where username = '$user'";
        $re = pg_query($conn, $query);
        $r = pg_fetch_assoc($re);
        $address = $r['Address'];

        //Get payment
        $sql5 = "Select SUM(qty_pro * sale_price), qty_pro, sale_price from cart c, product p where 
                 c.product_id = p.id and username = '$user'";
        $k = pg_query($conn, $sql5);
        $row2 = pg_fetch_assoc($k);
        $payment = $row2['SUM(qty_pro * sale_price)'];

        //Check cart and order
        $cart = "Select * from cart where username = '$user'";
        $check = pg_query($conn, $cart);
        if(pg_fetch_assoc($check) > 0){
            $sql1 = "INSERT INTO orders(username, orderDate, payment, address) VALUES ('$user', CURDATE(), $payment, '$address')";
            $Perform = pg_query($conn, $sql1);
        }
        else{
            echo "<script>alert('No products to order!')</script>";
        }

        //Get ID of order that just add
        $add = "SELECT MAX(order_id) FROM orders";
        $qr = pg_query($conn, $add);
        $n = pg_fetch_assoc($qr);
        $orderid = $n['MAX(order_id)'];

        //Get ID of product
        $sql2 = "Select * from cart where username = '$user'";
        $do = pg_query($conn, $sql2);

        //insert into order detail
        while($row = pg_fetch_assoc($do)){
            $a = "";
            $a = $row['product_id'];
            $qty_pro = $row['qty_pro'];

            $sql4 = "INSERT INTO orderdetail(order_id, product_id, qty_pro) VALUES ($orderid, '$a', $qty_pro)";
            $insert = pg_query($conn, $sql4);
        }

        echo "<script>alert('Order successfully')</script>";
        echo "<script>window.location = 'Home.php?status=order'</script>";


    }
?>
