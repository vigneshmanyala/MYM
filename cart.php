<?php
session_start();

if(!isset($_SESSION['loggedin'])){
    echo "<script>alert('Please LOGIN!')</script>";
    echo "<script>window.location='homepage.php'</script>";
    //header("Location: logout.php");
}
if(isset($_SESSION['loggedin']))
{
    if($_SESSION["time"]<=time()){ 
        header("Location:homepage.php");
    }
}

require_once("component.php");
include("connect.php");
if(isset($_POST['remove'])){
   if($_GET['action']=='remove'){
       foreach($_SESSION['cart'] as $key=>$value){
           if($value["prd_id"]==$_GET['prd_id']){
               unset($_SESSION['cart'][$key]);
               echo "<script>alert('Product has been removed...!')</script>";
               echo "<script>window.location='cart.php'</script>";
           }
       }
   }
}
if(isset($_POST['order'])){ 
        include("connect.php");
        $userid = $_SESSION['userid'];
        $date=date('y/m/d');
        $count=count($_SESSION['cart']);
         $ord = rand(1,100000);
         $status = "pending";
        $prd_id=array_column($_SESSION['cart'],'prd_id');
        $qnt = array_column($_SESSION['qnt'],'qnt');
        
        $que = "INSERT INTO `orders` (userid,orderid,date,status)VALUES('$userid',$ord,'$date','$status')";
        $result = mysqli_query($conn,$que);
       echo $result;
        for($i=0;$i<$count;$i++){
                $id = $prd_id[$i];
                $q=$qnt[$i];
                $sql="SELECT * FROM `product_det` where prd_id=$id";
                $result = mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
                $qnt_up=$row['prd_qnt']-$q;
                $up = "UPDATE `product_det` SET prd_qnt = $qnt_up WHERE prd_id=$id";
                $r=mysqli_query($conn,$up);
                $query="INSERT INTO `order_det` (orderid,prd_id,qnt)VALUES($ord,$id,$q)";
                $result=mysqli_query($conn,$query);
                //print_r($res);
              
               
                
            }
        
        //echo "<script>alert('Order has been Placed...!')</script>";
        //echo "<script>window.location='cust_middle.php'</script>";
}
    
?>



<!DOCTYPE html>
<html>
<head>
    <title>agri project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="css/cart.css">
    <!-- CSS only -->
    <!---------bootstrap cdn----------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!---------Font awesome--------->
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
                <li><a href="cust_middle.php">Home </a><i class="fa fa-home" aria-hidden="true"></i></li>   
                <li class="profile">Products <i class="fa fa-leaf"></i>
                    <ul class="dropdown">
                        <li><a href="vegetables.php">Vegetables</a></li>
                        <li><a href="fruits.php">Fruits</a></li>
                        <li><a href="flowers.php">Flowers</a></li>
                        <li><a href="herbs.php ">Exotic Herbs</a></li>
                    </ul>
                </li>
                <li> <a href="aboutUs.php">AboutUs</a><i class="fa fa-info-circle"></i></li>
                <li><a href="ContactUs.php"> ContactUs</a><i class="fa fa-envelope"></i></li>
                <li>Cart<i class="fa fa-shopping-cart">
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
                     <li><a href="">My orders</a></li>
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
   
   <!----------cart item details------------------>
   
<form method="post" action="cart.php">  
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h5>My Cart</h5>
                    <hr>
                    <?php
                    $total=0;
                    if(isset($_SESSION['cart']))
                    {
                    $qnt=array_column($_SESSION['qnt'],'qnt');
                    $count=count($_SESSION['cart']);
                     $prd_id=array_column($_SESSION['cart'],'prd_id');
                     $sql="SELECT * FROM `product_det`";
                     $result=mysqli_query($conn,$sql);
                     while($row = mysqli_fetch_assoc($result)){
                         for($i=0;$i<$count;$i++){
                             if($row['prd_id']==$prd_id[$i]){
                                 $pr=(int)$row ['prd_price']*$qnt[$i];
                                 if($row['prd_qnt'] < $qnt[$i]){
                                    echo "<script>alert('Out of stock...!')</script>";
                                    //echo "<script>window.location='cust_middle.php'</script>";'
                                 }
                                 else{
                                 cartElement($row['prd_image'],$row['prd_name'],$row['prd_price'],$row['prd_id'],$qnt[$i],$pr);
                                 $total = $total + (int)$row ['prd_price']*$qnt[$i];
                                }
                              
                             }
                         }
                     }
                    }
                    else{
                        echo "<h5>Cart is empty</h5>";
                    }
                    
                    
                    ?>
                    
                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
              <div class="pt-4">
              <h6>PRICE DETAILS</h6>
              <hr>
              <div class="row price-details">
                  <div class="col-md-6">
                      <?php
                       if(isset($_SESSION['cart'])){
                           $count = count($_SESSION['cart']);
                           echo "<h6>Price($count items)</h6>";
                       }
                       else{
                           echo "<h6>Price(0 items)</h6>";
                       }
                      
                      ?>
                      <h6>Delivery Charges</h6>
                      <hr>
                      <h6>Amount Payable</h6>
                  </div>
              <div class="col-md-6">
                <h6> Rs<?php echo $total; ?> </h6>
                <h6 class="text-success">FREE</h6>
                <hr>
                <h6>Rs<?php
                  echo $total;
                ?></h6>
                <br>
                <a class="nav-link" href="address.php">Manage Address</a>
                <button type="submit" class="btn btn-danger mx-2" name="order">Place order</button>
              </div>
            </div>
            </div>
        </div>  
    </div>
</div>
                    </form>
<br><br>
<!-------------------
<script>
        //setting default attribute to disabled of minus button
        document.querySelector(".minus-btn").setAttribute("disabled", "disabled");

        //taking value to increment decrement input value
        var valueCount

        //taking price value in variable
        var price = document.getElementById("price").innerText;

        //price calculation function
        function priceTotal() {
            var total = valueCount * price;
            document.getElementById("price").innerText = total
        }

        //plus button
        document.querySelector(".plus-btn").addEventListener("click", function() {
            //getting value of input
            valueCount = document.getElementById("quantity").value;

            //input value increment by 1
            valueCount++;

            //setting increment input value
            document.getElementById("quantity").value = valueCount;

            if (valueCount > 1) {
                document.querySelector(".minus-btn").removeAttribute("disabled");
                document.querySelector(".minus-btn").classList.remove("disabled")
            }

            //calling price function
            priceTotal()
        })

        //plus button
        document.querySelector(".minus-btn").addEventListener("click", function() {
            //getting value of input
            valueCount = document.getElementById("quantity").value;

            //input value increment by 1
            valueCount--;

            //setting increment input value
            document.getElementById("quantity").value = valueCount

            if (valueCount == 1) {
                document.querySelector(".minus-btn").setAttribute("disabled", "disabled")
            }

            //calling price function
            priceTotal()
        })
    </script>
------------------------------------------------------------>
<!----------footer--------------->
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
