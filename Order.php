<?php
// use function PHPSTORM_META\map;

    session_start();
    include_once("connection.php");

    if(isset($_SESSION['login'])){
        $user = $_SESSION['login'];

        $query = "Select address from public.account where username = '$user'";
        $re = pg_query($conn, $query);
        $r = pg_fetch_assoc($re);
        $address = $r['address'];

        //Get payment
        $sql5 = "Select SUM(qty_pro * sale_price) as payment from public.cart c, public.product p where 
                 c.product_id = p.id and username = '$user'";
        $k = pg_query($conn, $sql5);
        $row2 = pg_fetch_assoc($k);
        $payment = $row2['payment'];

        //Check cart and order
        $cart = "Select * from public.cart where username = '$user'";
        $check = pg_query($conn, $cart);
        if(pg_fetch_assoc($check) > 0){
            $sql1 = "INSERT INTO orders(username, orderdate, payment, address) VALUES ('$user', now(), $payment, '$address')";
            $Perform = pg_query($conn, $sql1);
        }
        else{
            echo "<script>alert('No products to order!')</script>";
        }

        //get number product in cart
        $pg = "select count(product_id) as numerous from cart where username='$user'";
        $per = pg_query($conn, $pg);
        $a = pg_fetch_assoc($per);
        $m = $a['numerous'];

        //Get ID of order that just add
        $add = "SELECT max(order_id) as id FROM public.orders";
        $qr = pg_query($conn, $add);
        $n = pg_fetch_assoc($qr);
        $orderid = $n['id'];

        //Get ID of product
        $sql2 = "Select * from public.cart where username = '$user'";
        $do = pg_query($conn, $sql2);
        $row = pg_fetch_all($do, PGSQL_ASSOC);

        for($i = 0; $i < $m; $i++){
            $a = $row[$i]['product_id'];
            $qty_pro = $row[$i]['qty_pro'];
            $sql4 = "INSERT INTO public.order_detail(order_id, product_id, qty_product) VALUES ($orderid, '$a', $qty_pro)";
            $insert = pg_query($conn, $sql4);

            $pgsql = "update public.product set quantity = quantity - $qty_pro";
            $make = pg_query($conn, $pgsql);
        }
        echo "<script>alert('Order successfully')</script>";
        echo "<script>window.location = 'index.php?status=order'</script>";


    }
?>
