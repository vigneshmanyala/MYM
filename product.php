<?php
session_start();

require_once('component.php');
include("connect.php");
if(isset($_POST['add'])){
  //echo $_POST['prd_id'];
  if(isset($_SESSION['cart']))
  {
    $item_array_id=array_column($_SESSION['cart'],'prd_id');
    
      if(in_array($_POST['prd_id'],$item_array_id)){
        echo "<script>alert('Product is already added to cart!!')</script>";
        echo "<script>window.location='product.php'</script>";
      }
      else
      {
        $count=count($_SESSION['cart']);
        $item_array = array(
          'prd_id' => $_POST['prd_id']
        );
        $_SESSION['cart'][$count]=$item_array;
      echo $_SESSION['cart'][0];
      }
  }
  else
  {
    
    $_SESSION['cart'][0]=$item_array;
    
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYM</title>
    <link type="text/css" link rel="stylesheet" href="css/product.css">
    <!---------bootstrap cdn----------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!---------Font awesome--------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.js"></script>
</head>
<body>
  <!----------header------------>
  <div class="header">
        <h1>MAKE YOUR MARKET</h1>
    </div>
    <nav>
        <div class="login-header">
            <ul id="headermenu">
                <li>Home <i class="fa fa-home" aria-hidden="true"></i></li>   
                <li class="profile">Products <i class="fa fa-leaf"></i>
                    <ul class="dropdown">
                        <li><a href="#veg">Vegetables</a></li>
                        <li><a href="#fruits">Fruits</a></li>
                        <li><a href="#flowers">Flowers</a></li>
                        <li><a href="#herbs">Exotic Herbs</a></li>
                    </ul>
                </li>
                <li> <a href="aboutUs.php">AboutUs</a><i class="fa fa-info-circle"></i></li>
                <li><a href="ContactUs.php"> ContactUs</a><i class="fa fa-envelope"></i></li>
                <li><a href="cart.php">Cart</a><i class="fa fa-shopping-cart">
                <?php
                  if(isset($_SESSION['cart'])){
                    $count=count($_SESSION['cart']);
                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                  }
                  else{
                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                  }
                ?>
                </i></li>
               <!-- <li class="profile">user<i class="fa fa-user" aria-hidden="true"></i>
                   <ul class="dropdown">
                     <li>Profile</li>
                     <li>My Orders</li>
                     <li>Log out</li>
                  </ul> --> 
                </li>
                <li class="profile">login/Signup
                    <ul class="dropdown">
                        <li><a href="cust_login.php">Customer</a></li>
                        <li><a href="cust_login.php">Farmer</a></li>
                        <li><a href="admin_login.php">Admin</a></li>

                    </ul>
                </li>
            </ul>
    </div>
    </nav>
    <br>
    <!---------------------------------header ends-------------------------------------->






   






    <h4 align="center">VEGETABLES</h4>
<div id="veg">
<div class="container">
   <div class="row text-center py-5">

     <?php 
        $sql="SELECT * FROM `product_det` where `category`='veg'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
           component($row['prd_name'],$row['prd_price'],$row['prd_image'],$row['prd_id']);

        }
   
     
     ?>
   </div>
</div>
</div>

<h4 align="center">FRUITS</h4>
<div id="fruits">
<div class="container">
   <div class="row text-center py-5">

     <?php 
        $sql="SELECT * FROM `product_det` where `category`='fruits'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
           component($row['prd_name'],$row['prd_price'],$row['prd_image'],$row['prd_id']);

        }
   
     
     ?>
   </div>
</div>
</div>

<h4 align="center">FLOWERS</h4>
<div id="flowers">
<div class="container">
   <div class="row text-center py-5">

     <?php 
        $sql="SELECT * FROM `product_det` where `category`='flowers'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
           component($row['prd_name'],$row['prd_price'],$row['prd_image'],$row['prd_id']);

        }
   
     
     ?>
   </div>
</div>
</div>

<h4 align="center">HERBS</h4>
<div id="herbs">
<div class="container">
   <div class="row text-center py-5">

     <?php 
        $sql="SELECT * FROM `product_det` where `category`='herbs'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
           component($row['prd_name'],$row['prd_price'],$row['prd_image'],$row['prd_id']);

        }
   
     
     ?>
   </div>
</div>
</div>
<!-------------------footer------------------------------->
<div class="footer">
    <div class="container">
            <div class="column">
                <h2>About Us</h2>
                <div class="footer-widget">
                    <p>Our website is an online food and grocery store. Right from fresh Fruits and Rice and Dals, Vegetables, Spices & Seasonings to Packaged products. You can choose from a wide range of options in every category, exclusively handpicked to help you find the best quality available at the lowest prices. Select a time slot for delivery and your order will be delivered right to your doorstep, You can pay online using your debit / credit card or by cash. We guarantee on time delivery, and the best quality!</p>
                    <p><span><i class="fa fa-lock"></i></span>Secure online payment </p>
                </div>
            </div>
            <div class="column">
                <h2>Categories</h2>
                <div class="footer-widget">
                    <ul>
                        <li><a href="fruits.php">Fruits</a></li>
                        <li><a href="vegetables.php">Vegetables</a></li>
                        <li><a href="flowers.php">Flowers  </a></li>
                        <li><a href="herbs.php">Herbs</a></li>
                    </ul>
                 </div>
            </div>
            <div class="column">
                <h2>Information</h2>
                <div class="footer-widget">
                    <ul>
                        <li><a href="aboutUs.php">About Us</a></li>
                        <li><a href="ContactUs.php">Contact Us</a></li>
                        <li><a href="">Term & Conditions </a></li>
                        <li><a href="">Return & Exchange</a></li>
                        <li><a href="">Shipping & Delivery </a></li>
                        <li><a href="">Private Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="column">
                <h2>Contact Us</h2>
                <div class="footer-widget">
                        <ul>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i>Vishakapatnam AndhraPradesh</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>12345678901</li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i>makeyourmarket9@gmail.com</li>
                        </ul>
                            <div class="social-widget">
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-instagram"></i></a>
                            <a href=""><i class="fa fa-twitter"></i></a>
                        </div>
                </div>

            </div>
            <div class="footer-bottom">
                Copyright &copy; makeyourmarket 2019. All rights reserved.
            </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
</body>
</html>