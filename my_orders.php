<?php

session_start();
include("connect.php");
if(!isset($_SESSION['loggedin'])){
    header("Location: logout.php");
}
if(isset($_SESSION['loggedin']))
{
    if($_SESSION["time"]<=time()){ 
        header("Location:homepage.php");
    }
}

?>



<!DOCTYPE html>
<html>
<head>
    <title>agri project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="css/orders.css">
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
                <li><a href="cust_middle.php">Home</a> <i class="fa fa-home" aria-hidden="true"></i></li>   
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


            
    
    <?php
    $userid = $_SESSION['userid'];
    if($_SESSION['user'] == 1)
    {
        $sql = "SELECT * FROM `add_product` WHERE userid=$userid";
        $query = mysqli_query($conn,$sql);
        ?>
        <table>
            <tr>
                <th>Date</th>
                <th>Product</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Amount</th>
            </tr>
        <?php
        while($row1 = mysqli_fetch_assoc($query)){
        $id = $row1['prd_id'];

            $que = "SELECT * FROM `product_det` WHERE prd_id = $id";
            $res = mysqli_query($conn,$que);
            $row2 = mysqli_fetch_assoc($res);
            $date = $row1['date'];
            $image = $row2['prd_image'];
            $name = $row2['prd_name'];
            $cat = $row2['category'];
            $price = $row1['price'];
            $qnt = $row1['quantity'];
            $tot = $row1['total'];
            echo "
            <tr>
               <td>$date</td>
               <td><img src=\"$image\" style=\"width:50% height:50%\"></td>
               <td>$name</td>
               <td>$cat</td>
               <td>$price</td>
               <td>$qnt</td>
               <td>$tot</td>
            </tr>
            ";
        }
    }
    ?>

    </table>
<?php
if($_SESSION['user']==2){

    $sql ="SELECT * FROM `orders` where $userid=userid";
    $query = mysqli_query($conn,$sql);
    while($row1=mysqli_fetch_assoc($query)){
        ?>

        <table>
            <tr>
                <th>OrderId</th>>
            </tr>
        <?php
        $orderid = $row1['orderid'];
        echo "<tr>
          <td>$orderid<td>
          </tr>         
        ";
    ?>
        <tr>
        <th>Product</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th> 
        <th>SubTotal</th>
        <th>Date</th> 
        <th>Status</th>  
    </tr>
    <?php
        $det = "SELECT * FROM `order_det` where orderid=$orderid";
        $res =  mysqli_query($conn,$det);
        $total=0;
        while($row2=mysqli_fetch_assoc($res)){

            $pd = "SELECT * FROM `product_det` where prd_id=$row2[prd_id]";
            $que = mysqli_query($conn,$pd);
            $row3=mysqli_fetch_assoc($que);
            $date = $row1['date'];
            $status = $row1['status'];
            $qnt = $row2['qnt'];
            $price = $row3['prd_price'];
            $subtotal = $qnt*$price;
            $total = $total + $price*$qnt;
            $prdname = $row3['prd_name'];
            $image = $row3['prd_image'];
            echo "

            <tr>
            <td><img src=\"$image\" style=\"width:50% height:50%\"></td>
            <td>$prdname</td>
            <td>$qnt</td>
            <td>$price</td>
            <td>$subtotal</td>
            <td>$date</td>
            <td>$status</td>
            </tr>

            ";
            
            
    }
    ?>
    <tr>
            <th>Amount paid:</th>
    
            

    <?php
    echo "<th> $total </th>";
    ?>
    </tr>
    </table>
<?php
}
}
   ?> 
   </body>
   </html>