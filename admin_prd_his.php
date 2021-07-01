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
<form action="admin_prd_his.php" method="post">
<table class="table text-center mt-1 table-bordered">
    <tr>
        <th>Date</th>
        <th>FarmerId</th>
        <th>Farmer Name</th>
        <th>ProductId</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>

    </tr>
<?php
include("connect.php");
$sql = "SELECT * FROM `add_product` order by date";
$res = mysqli_query($conn,$sql);
while($row1=mysqli_fetch_assoc($res)){
    
    $date = $row1['date'];
    $id = $row1['farmer_id'];
    $prd_id = $row1['prd_id'];
    $qnt = $row1['quantity'];
    $price = $row1['price'];
    $total = $row1['total'];
    $que = "SELECT * FROM `cust_regform` WHERE userid = $id";
    $r1 = mysqli_query($conn,$que);
    $row2 = mysqli_fetch_assoc($r1);
    $fname  = $row2['fname'];
    $que2 = "SELECT * FROM `product_det` WHERE prd_id = $prd_id";
    $r2 = mysqli_query($conn,$que2);
    $row3 = mysqli_fetch_assoc($r2);
    $pname = $row3['prd_name'];
    
    echo "
      <tr>
        <td>$date</td>
        <td>$id</td>
        <td>$fname</td>
        <td>$prd_id</td>
        <td>$pname</td>
        <td>$qnt</td>
        <td>$price</td>
        <td>$total</td>
      </tr>  
    
    ";


}


?>
</table>
</form>
</body>
</html>