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
  if(isset($_POST['submit'])){
    $prdid=$_POST['prdid'];
    $category = $_POST["category"];
    $prd_name = $_POST["prd_name"];
    include("connect.php"); 
    $sql = "SELECT * FROM `product_det` where prd_id=$prdid";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
    if(mysqli_num_rows($result == 1)){
        $sql1 = "DELETE FROM `product_det` where prd_id = $prdid";
    }
    else{
        echo "Invalid ProductId";
    }
}
if(isset($_POST['update'])){
    $id = $_POST['prdid'];
    $cat = $_POST['category'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    include("connect.php");
    $que = "UPDATE `product_det` SET prd_price = $price WHERE prd_id=$id";
    $res = mysqli_query($conn,$que);
}

?>
<!DOCTYPE html>
<html>
    <head>
    <link type="text/css" rel="stylesheet" href="css/delproduct.css">
    <!---------bootstrap cdn----------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!---------Font awesome--------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title> 
    </head>

    <body>
    <div class="icon">
        <h2>Delete Product</h2>
        
           <h3><a href="admin.php">Home</a></h3>
</div>
        <form action="delproduct.php" method="POST">
<br><br><br><br>
        <table>
            <tr>
                <th>ProductId </th>
                <th>Category</th>
                <th>Name of Product </th>

            </tr>
            
            <tr>
                
                <td><input type="text" class="input-box" name="prdid" placeholder="Product Id"/></td>
                <td><input type="text" class="input-box" name="category" placeholder="Type of the product"/></td>
                <td><input type="text" class="input-box" name="prd_name" placeholder="Name of the Product"/></td>
            </tr>


        </table>
        <button type=submit class="btn-danger" name="submit">Delete</button>
        
        </form>

        <br><br><br><br><br><br>


<!----------------------------------Modify------------------------------------------------>





        <div class="icon">
        <h2>Modify Product</h2>
        
</div>
        <form action="delproduct.php" method="POST">
        <br><br><br><br>
        <table>
            <tr>
                <th>ProductId</th>
                <th>Category</th>
                <th>Name of Product </th>
                <th>Price</th>

            </tr>
            
            <tr>
                
                <td><input type="text" class="input-box" name="prdid" placeholder="Product Id"/></td>
                <td><input type="text" class="input-box" name="category" placeholder="Type of the product"/></td>
                <td><input type="text" class="input-box" name="name" placeholder="Name of the Product"/></td>
                <td><input type="text" class="input-box" name="price" placeholder="price in Rs per kg"/></td>
            </tr>


        </table>
        <button type=submit class="btn-danger" name="update">Update</button>
        
        </form>
        <br><br><br><br>
    </body>
</html>