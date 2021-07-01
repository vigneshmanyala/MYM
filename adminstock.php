<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header("Location: logout.php");
}
if(isset($_SESSION['loggedin']))
{
    if($_SESSION["time"]<=time()){ 
        header("Location: homepage.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
    <link type="text/css" rel="stylesheet" href="css/adminstock.css">
    <!---------bootstrap cdn----------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!---------Font awesome--------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title> 
    </head>

    <body>
<form method="post" action="adminstock.php">
    <div class="icon">
        <h2>Stock Available</h2>
        
           <h3><a href="admin.php">Home</a></h3>
</div>
<br><br>
         <h3>PRODUCTS WITH QUANTITY '0'</h3>
         <br>
<table>
    <tr>
        <th>ProductId</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>

<?php
 include("connect.php");
 $que = "SELECT * FROM `product_det` WHERE prd_qnt = 0";
 $res = mysqli_query($conn,$que);
 while($row = mysqli_fetch_assoc($res)){
     $id = $row['prd_id'];
     $name = $row['prd_name'];
     $cat = $row['category'];
     $price = $row['prd_price'];
     $qnt = $row['prd_qnt'];
     echo "
     <tr>
     <td>$id</td>
     <td>$name</td>
     <td>$cat</td>
     <td>$price</td>
     <td>$qnt</td>
     </tr>";
 }

?>
</table>
<br><br><br>
<br><br>
         <h3>PRODUCTS WITH 'NON-ZERO' QUANTITY'</h3>
         <br>
         <div class="cat">
         <ul>

             <li>
                 <input type="submit" name="veg" value="vegetables" class="bb"></li>
                <li> <input type="submit" name="fruits" value="fruits" class="bb"></li>
                <li> <input type="submit" name="flowers" value="flowers" class="bb"></li>
                <li> <input type="submit" name="herbs" value="herbs" class="bb">
            </li>
        </ul>
        </div>
        <br><br>

  

<?php
if(isset($_POST['veg'])){
    ?>
    <table>
    <tr>
        <th>ProductId</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    <?php
 include("connect.php");
 $que = "SELECT * FROM `product_det` WHERE prd_qnt <> 0 and category = 'veg'";
 $res = mysqli_query($conn,$que);
 while($row = mysqli_fetch_assoc($res)){
     $id = $row['prd_id'];
     $name = $row['prd_name'];
     $cat = $row['category'];
     $price = $row['prd_price'];
     $qnt = $row['prd_qnt'];
     echo "
     <tr>
     <td>$id</td>
     <td>$name</td>
     <td>$cat</td>
     <td>$price</td>
     <td>$qnt</td>
     </tr>";
 }
}
else if(isset($_POST['fruits'])){
    ?>
    <table>
    <tr>
        <th>ProductId</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    <?php
    include("connect.php");
 $que = "SELECT * FROM `product_det` WHERE prd_qnt <> 0 and category = 'fruits'";
 $res = mysqli_query($conn,$que);
 while($row = mysqli_fetch_assoc($res)){
    ?>
    <table>
    <tr>
        <th>ProductId</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    <?php
     $id = $row['prd_id'];
     $name = $row['prd_name'];
     $cat = $row['category'];
     $price = $row['prd_price'];
     $qnt = $row['prd_qnt'];
     echo "
     <tr>
     <td>$id</td>
     <td>$name</td>
     <td>$cat</td>
     <td>$price</td>
     <td>$qnt</td>
     </tr>";
 }
}
else if(isset($_POST['flowers'])){
    ?>
    <table>
    <tr>
        <th>ProductId</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    <?php
    include("connect.php");
 $que = "SELECT * FROM `product_det` WHERE prd_qnt <> 0 and category = 'flowers'";
 $res = mysqli_query($conn,$que);
 while($row = mysqli_fetch_assoc($res)){
     $id = $row['prd_id'];
     $name = $row['prd_name'];
     $cat = $row['category'];
     $price = $row['prd_price'];
     $qnt = $row['prd_qnt'];
     echo "
     <tr>
     <td>$id</td>
     <td>$name</td>
     <td>$cat</td>
     <td>$price</td>
     <td>$qnt</td>
     </tr>";
 }
}
else if(isset($_POST['herbs'])){
    ?>
    <table>
    <tr>
        <th>ProductId</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    <?php
    include("connect.php");
 $que = "SELECT * FROM `product_det` WHERE prd_qnt <> 0 and category = 'herbs'";
 $res = mysqli_query($conn,$que);
 while($row = mysqli_fetch_assoc($res)){
     $id = $row['prd_id'];
     $name = $row['prd_name'];
     $cat = $row['category'];
     $price = $row['prd_price'];
     $qnt = $row['prd_qnt'];
     echo "
     <tr>
     <td>$id</td>
     <td>$name</td>
     <td>$cat</td>
     <td>$price</td>
     <td>$qnt</td>
     </tr>";
 }
}
?>
</table>
</form>
</body>
</html>