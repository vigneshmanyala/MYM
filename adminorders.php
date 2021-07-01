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

if(isset($_POST['act'])){
    $stat = $_POST['act'];
    $id = $_POST['id'];
    include("connect.php");
    $sql = "UPDATE `orders` SET status='$stat' WHERE orderid=$id";
    $rslt = mysqli_query($conn,$sql);
    if($rslt){
        echo "<script>alert('status updated Successfully..........')</script>";
    }

} 


?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="css/adminorders.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!---------Font awesome--------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.js"></script>
    </head>
    <body>
        <div class="icon">
           <h3><a href="admin.php">Home</a></h3>
        </div>


<br>

<table class="table text-center mt-1 table-bordered">
    <tr>
    <th>Date</th>
    <th>OrderId</th>
    <th>Status</th>
    <th>UserId</th>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>City</th>
    <th>Pincode</th>
    <th>Mobileno</th>
    <th class="text-center">Action</th>
</tr>
<?php
include("connect.php");
$q1 = "SELECT * from `orders` ORDER BY date";
$res1 = mysqli_query($conn,$q1);
while($row1=mysqli_fetch_assoc($res1))
{
    $q2 = "SELECT * from `cust_regform` where userid=$row1[userid]";
    $res2 = mysqli_query($conn,$q2);
    $row2 = mysqli_fetch_assoc($res2);
    $userid = $row1['userid'];
    $date = $row1['date'];
    $orderid = $row1['orderid'];
    $st = $row1['status'];
    $name = $row2['fname'];
    $email = $row2['email'];
    $address = $row2['address'];
    $city = $row2['city'];
    $pincode = $row2['pincode'];
    $mbl = $row2['phnno'];
?> 
    <tr>
        <td><?php echo $date; ?></td>
        <td><?php echo $orderid; ?></td>
        <td><?php echo $st; ?></td>
        <td><?php echo $userid; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $address; ?></td>
        <td><?php echo $city; ?></td>
        <td><?php echo $pincode;?></td>
        <td><?php echo $mbl; ?></td>
        <td><a href="?action=order&orderid=<?php echo $orderid ?>" class="btn btn-sm btn-info" style="width:120px;">View order</a></td>
</tr>
  
<?php
}
if(isset($_GET['action'])){
    
    include("connect.php");
   $orderid=$_GET['orderid'];
   $que0="SELECT * FROM `orders` where orderid = $orderid";
   $res0 = mysqli_query($conn,$que0);
   $row = mysqli_fetch_assoc($res0);
   $status = $row['status'];
   $que1="SELECT * from `order_det` where orderid = $orderid";
   $res1 = mysqli_query($conn,$que1);
   $total=0;
   ?>

    <table class="table text-center table-bordered">
        <tr>
        <th>OrderId</th>
        <th class="text-center">Status</th>
        <th class="text-center">Action</th>
        </tr>
    <?php
         echo "<tr>
         <td>$orderid</td>
         <td>
            <form method='post' action='adminorders.php'>
                <select name='act' onchange='form.submit()'>
                <option value='pending'>Pending</option>
                <option value = 'transporting'>Transporting</option>
                <option value = 'delivered'>Delivered</option>
             </select>
            <input type='hidden' name='id' value=$orderid />
            </form>
        </td>
        <td>$status</td>
         </tr>         
       ";
    ?>
    <br><br>
    </table>
    <table class="table text-center mt-1 table-bordered">
        <tr>
            <th>Product</th>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Sub Total</th>
        </tr>
        <?php
   while($row1 = mysqli_fetch_assoc($res1))
   {
   $que2 = "SELECT * from `product_det` where prd_id = $row1[prd_id]";
   $res2 = mysqli_query($conn,$que2);
   $row2 = mysqli_fetch_assoc($res2);
   $prdimg = $row2['prd_image'];
   $orderid = $row1['orderid'];
   $prdid = $row1['prd_id'];
   $name = $row2['prd_name'];
   $qnt = $row1['qnt'];
   $price = $row2['prd_price'];
   $sub = $row1['qnt']*$row2['prd_price'];
   $total = $total+$row2['prd_price']*$row1['qnt'];
   //$status = $row1['status'];
   
   echo "

   <tr>
   <td><img src=\"$prdimg\" style=\"width:50% height:50%\"></td>
   <td>$prdid</td>
   <td>$name</td>
   <td>$qnt</td>
   <td>$price</td>
   <td>$sub</td>
   </tr>

   ";
   
   }
   ?>
   <tr>
   <th>Total Amount:</th>
   <?php
   echo "
          <th>$total</th>
        ";
   ?>
   </tr>
   </table>
<?php
  
}
?>




</table>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
</body>
</html>