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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="css/admin.css"/>
    </head>
    <body>
        <div class="icon">
           <h3><a href="logout.php">Logout</a></h3>
        </div>
        <div class="container">
            <div class="row">
              <div class="col">
                <div class="card">
                  <div class="inner-box">
                    <div class="card-front">
                        <p>ORDER DETAILS</p>
                    </div>
                    <div class="card-back">
                        <li class="selected">
                            <a href="adminorders.php">Manage Orders</a>
                        </li>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="inner-box">
                    <div class="card-front">
                        <p>UPDATION</p>
                    </div>
                    <div class="card-back">
                         <li class="selected1">
                            <a href="addproduct.php">Add</a>
                        </li>
                        <li class="selected1">
                            <a href="delproduct.php">Delete/Modify</a>
                        </li>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="inner-box">
                    <div class="card-front">
                        <p>PRODUCT DETAILS</p>
                    </div>
                    <div class="card-back">
                         <li class="selected1">
                            <a href="admin_prd_his.php">Products History</a>
                        </li>
                        <li class="selected1">
                            <a href="adminstock.php">Stock Available</a>
                        </li>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>
    </body>
</html>