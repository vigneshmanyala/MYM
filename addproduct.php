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

if(isset($_POST['add'])){
    $farmer_id=$_POST['farmer_id'];
    $prd_id = $_POST['prd_id'];
    $quantity = $_POST["quantity"];
    $price=$_POST["price"];
    $total=(int)$price * (int)$quantity;
    $date=date('y/m/d');
    $error=0;
include("connect.php");
if(isset($_POST['farmer_id'])){
    
    $sql = "SELECT * FROM `cust_regform` where userid =$farmer_id ";
    $que = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($que);
    if($num == 0){
        $_SESSION['err1']=true;
        $error=1;
    }
   }
   if(isset($_POST['farmer_name'])){
    
    $sql = "SELECT * FROM `cust_regform` where userid =$farmerid ";
    $que = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($que);
    $num = mysqli_num_rows($que);
    if($num == 0){
        $_SESSION['err1']=true;
        $error=1;
    }
   }

$que = "UPDATE `product_det` set prd_qnt=prd_qnt+$quantity where prd_id=$prd_id";
$res = mysqli_query($conn,$que);
$query="INSERT INTO `add_product` VALUES('$farmer_id','$prd_id','$quantity','$price','$total','$date')";
$result=mysqli_query($conn,$query);
}

if(isset($_POST['addnew'])){
    $name=$_POST['name'];
    $cat=$_POST['category'];
    $price=$_POST['price'];
    $Image=$_POST['Image'];
    $qnt=$_POST['quantity'];
    include("connect.php");
    $que = "INSERT INTO `product_det` VALUES('$name','$cat','$price','$Image','$qnt')";
    $res = mysqli_query($conn,$que);
}

?>
<!DOCTYPE html>
<html>
    <head>
    <link type="text/css" rel="stylesheet" href="css/addproduct.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title> 
    </head>

    <body>
    <div class="icon">
        <h2>Add Product Quantity</h2>
        
           <h3><a href="admin.php">Home</a></h3>
</div>
        <form action="addproduct.php" method="POST">

        <table>
            <tr>
                <th>FarmerId </th>
                <th>ProductId</th>
                <th>Quantity</th>
                <th>Price</th> 

            </tr>
            
            <tr>
                
                <td><input type="text" class="input-box" name="farmer_id" placeholder="Farmer id" required/>
                <?php 
           if(isset($_SESSION['err1'])){
                if($_SESSION['err1']){
                    echo "<div class='first'>*Invalid userid </div>";
                    $_SESSION['err1']=false;
                }
           }
        ?>
                </td>
                <td><input type="text" class="input-box" name="prd_id" placeholder="ProductId" required/></td>
                <td><input type="text" class="input-box" name="quantity" placeholder="Quantity in kg" required/></td>
                <td><input type="text" class="input-box" name="price" placeholder="Cost in Rs per kg" required/></td>
            </tr>


        </table>
        <button type="submit" class="btn" name="add">Add</button>
        </form>
        <br>
        <br>
        <br>








        <div class="icon">
            <h2>Add New Product</h2>
        
        </div>
        <form action="addproduct.php" method="POST">

            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th> 
                    <th>Product Image</th>
                    <th>Quantity</th>
                    

                </tr>
            
                <tr>
                    <td><input type="text" class="input-box" name="name" placeholder="Name of the Product"/></td>
                    <td><input type="text" class="input-box" name="category" placeholder="Type of the product"/></td>
                    <td><input type="text" class="input-box" name="price" placeholder="Price per kg"/></td>
                    <td><input type="text" class="input-box" name="Image" placeholder="Address of image"/></td>
                    <td><input type="text" class="input-box" name="quantity" placeholder="Quantity in kg"/></td>
                    
                </tr>
            </table>
        <button type="submit" class="btn" name="addnew">Add new</button>
        </form>
    </body>
</html>