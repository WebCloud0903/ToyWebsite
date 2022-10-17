<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home.php</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     

        <style>
            body{
                background-color: #e8e8e8;
            }
            .container{
                width: 100%;
            }
            .container-fluid{
                margin-top: 30px;
            }
            .navbar-brand img{
                width: 135px;
                height: 65px;
                padding: 11px 15px;
                margin-top: -22px;
                margin-left: -15px;
                margin-right: 20px;
            }
            .marquee{
                color: red;
            }
            .shoe{
                background-color: #fff;
                padding: 20px;
                float: left;
                margin-bottom: 20px;
            }
            .media{
                width: 655px;
                height: 200px;
            }
            .img-responsive{
                width: 200px;
                height: 200px;
            }
            .btn a{
                color: white;
            }
            @media screen and (min-width: 990px){
                .shoe img{
                    max-width: 200px;
                }
            }
            @media screen and (max-width: 990px){
                .shoe img{
                    width: 200px;
                    height: 200px;
                }
            }

        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" 
                        data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><img src="./Image/10Logo-toys.jpg"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="About.php">About us</a></li>
                            <li><a href="Product.php">Product</a></li>
                            <li><a href="Cart.php">Cart <i class="fas fa-cart-plus"></i></a></li>
                         </ul>

                        <?php
                            if(!isset($_SESSION['login']) || !isset($_SESSION['Admin']))
                            {?>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="SignUp.php"><span class="glyphicon gluphicon-user"></span> Sign Up</a></li>
                                    <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                                </ul>
                    <?php   } ?>
                        
                    </div>
                </nav>
                
                <div class="row heading">
                    <div class="title col-md-12">
                        <h1>Huu Duy Toy Store</h1>
                        <h4>Welcome <?php 
                        if(isset($_SESSION['login']))
                        {
                            echo $_SESSION['login'];?>
                            <a href="User-Logout.php" style='margin-left:1200px'>Logout</a>
                       <?php } ?>
                       
                       </h4>
                        <div id="welcome">
                            <marquee direction="left" behavior="scroll" scrollamount="5">
                                Welcome to the online website - Toy Store 
                            </marquee>
                        </div>
                        <div class="marquee">
                            <marquee direction="down" width="12" height="22" behavior="alternate" >
                                <b> <marquee behavior="alternate">
                                   N
                                 </marquee>
                               </marquee>
                                <b> <marquee direction="down" width="12" height="22" behavior="alternate" >
                                 <marquee behavior="alternate">
                                   E
                                 </marquee>
                               </marquee>
                                <b> <marquee direction="down" width="12" height="22" behavior="alternate" >
                                 <marquee behavior="alternate">
                                   W
                                 </marquee>
                               </marquee>
                                <b> <marquee direction="down" width="12" height="22" behavior="alternate" >
                                 <marquee behavior="alternate">
                                   P
                                 </marquee>
                               </marquee>
                                <b> <marquee direction="down" width="12" height="22" behavior="alternate" >
                                 <marquee behavior="alternate">
                                   R
                                 </marquee>
                               </marquee>
                               <marquee direction="down" width="12" height="22" behavior="alternate" >
                                <b>   <marquee behavior="alternate">
                                   O
                                 </marquee>
                               </marquee>
                               <marquee direction="down" width="12" height="22" behavior="alternate" >
                                 <b>  <marquee behavior="alternate">
                                   D
                                 </marquee>
                               </marquee>
                               <marquee direction="down" width="12" height="22" behavior="alternate" >
                                <b>  <marquee behavior="alternate">
                                  U
                                </marquee>
                              </marquee>
                              <marquee direction="down" width="12" height="22" behavior="alternate" >
                                <b>  <marquee behavior="alternate">
                                  C
                                </marquee>
                              </marquee>
                              <marquee direction="down" width="12" height="22" behavior="alternate" >
                                <b>  <marquee behavior="alternate">
                                  T
                                </marquee>
                              </marquee>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="shoe">
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#">
                                        <img src="./Image/5robot.jpg" class="img-responsive media-object">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Robot</a></h4>
                                    <p>$2.000.000</p>
                                    <button type="button" class="btn btn-primary mb-3"><a href="Product.php">Learn more</a></button>
                                </div>
                            </div>
                        </div>

                        <div class="shoe">
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#">
                                        <img src="./Image/7moto.jpg" class="img-responsive media-object">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Moto</a></h4>
                                    <p>$2.500.000</p>
                                    <button type="button" class="btn btn-primary mb-3"><a href="Product.php">Learn more</a></button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="shoe">
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#">
                                        <img src="./Image/1oto.jpg" class="img-responsive media-object">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Oto</a></h4>
                                    <p>$3.000.000</p>
                                    <button type="button" class="btn btn-primary mb-3"><a href="Product.php">Learn more</a></button>
                                </div>
                            </div>
                        </div>

                        <div class="shoe">
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#">
                                        <img src="./Image/4plane.webp" class="img-responsive media-object">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Plane</a></h4>
                                    <p>$2.500.000</p>
                                    <button type="button" class="btn btn-primary mb-3"><a href="Product.php">Learn more</a></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                            if(isset($_SESSION['Admin']))
                            {?>
                                    <a href="Admin.php" id="admin">Admin</a>
                            
                      <?php } ?>

                </div>

                <hr>

                <footer class="footer">
                    <div>
                        &copy; Copyright: 11-5-2022<br>
                        Toy Store Online., HD-Vietnam Branch<br>
                        Address: P8 - Dinh Tien Hoang - TP Vinh Long<br>
                        Tel: 0931927908<br>
                        Created by: Do Huu Duy
                    </div>
                </footer>


            </div>

        </div>
      
    </body>
</html>