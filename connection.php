<?php
// $server = "localhost";
// $username = "root";
// $password = "";
// $db = "shop_200018";
// $server = "ec2-52-4-87-74.compute-1.amazonaws.com:5432";
// $username = "izslbhgirodqpi";
// $password = "f35b00a3d5896ade13e27f780d341af50e971929370a023c0f1a5564ad04761a";
// $db = "Toy_Web";
// $conn = pg_connect($server, $username, $password, $db);
$conn = pg_connect("postgres://izslbhgirodqpi:f35b00a3d5896ade13e27f780d341af50e971929370a023c0f1a5564ad04761a@ec2-52-4-87-74.compute-1.amazonaws.com:5432/d1s4jmvdpoppn1");
if(!$conn){
    die("Connection failed");
}
?>