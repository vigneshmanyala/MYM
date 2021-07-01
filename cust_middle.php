<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header("Location: logout.php");
}
if(isset($_SESSION['loggedin']))
{
    if($_SESSION["time"]<=time()){ 
        header("Location:homepage.php");
    }
}

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
      
      }
  }
  else
  {
    
    $_SESSION['cart'][0]=$item_array;
    print_r($_SESSION['cart']);
  }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>agri project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="css/homepage.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.js"></script>
</head>
<body>
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
                        <li><a href="#herbs ">Exotic Herbs</a></li>
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
                <li class="profile">user<i class="fa fa-user" aria-hidden="true"></i>
                   <ul class="dropdown">
                     <li><a href="yourprofile.php">My Profile</a></li>
                     <li><a href="my_orders.php">My orders</a></li>
                     <li><a href="logout.php">Log out</a></li>
                  </ul>
                </li>
                <!----<li class="profile">login/Signup
                    <ul class="dropdown">
                        <li><a href="cust_login.php">Customer</a></li>
                        <li><a href="farmer_login.php">Farmer</a></li>
                        <li><a href="admin_login.php">Admin</a></li>

                    </ul>
                </li>--->
            </ul>
    </div>
    </nav>
    <br>
<!--    **********sliding starting images**********      -->
<div class="slideshow-container">

    <div class="mySlides">
      <div class="numbertext">1 / 4</div>
      <img src="images/pic7.jpg" style="width:100%">
      <div class="text">Caption Text</div>
    </div>
    
    <div class="mySlides">
      <div class="numbertext">2 / 4</div>
      <img src="images/pic2.jpg" style="width:100%">
      <div class="text">Caption Two</div>
    </div>
    
    <div class="mySlides">
      <div class="numbertext">3 / 4</div>
      <img src="images/pic3.jpg" style="width:100%">
      <div class="text">Caption Three</div>
    </div>
    <div class="mySlides">
        <div class="numbertext">4 / 4</div>
        <img src="images/pic5.png" style="width:100%">
        <div class="text">Caption four</div>
      </div>
    
</div>
<br> 
    <div style="text-align:center">
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span>
    </div><br>
<!--    **********sliding starting images ending**********      -->
   <!-- <table>
        <tr>
        <td><a href=""><img src="fruit.png"></a></td>
        <td><a href=""><img src="vege.jpg"></a></td>
        </tr>
        <tr>
            <td><a href="products page/products.html">Fruits</a></td>
            <td><a href="vegetables/vegetables.html">Vegetables</a></td>
        </tr>
    </table>*/ -->
    <div class="category">
        <h1>Shop by Category</h1>
        <table>
            <tr>
                <td><img src="images/img2.png" ></td>
                <td><img src="images/img3.png" ></td>
            </tr>
            <tr>
                <td><a href="#fruits"><h4>Fruits</h4></a></td>
                <td><a href="#veg"><h4>Vegetables</h4></a></td>
            </tr>
            <tr>
                <td><img src="images/img4.jpeg"></td>
                <td><img src="images/img1.jpg" ></td>
            </tr>
            <tr>
                <td><a href="#flowers"><h4>flowers</h4></a></td>
                <td><a href="#herbs"><h4>exotic herbs</h4></a></td>
            </tr>
        </table>

    </div>
<br>
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
<!----------------Products----------------------------->

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
<script>
    var slideIndex = 0;
    showSlides();
    
    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides,2000); 
    }
    </script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
</body>
</html>


    














    