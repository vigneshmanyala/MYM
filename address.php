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
$conn=mysqli_connect("localhost","root","","mym");
        if(!$conn){
            die("sorry failed to connect :". mysqli_connect_error());
        }
$id=$_SESSION['userid'];
$query= "SELECT * from `cust_regform` where userid='$id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<link type="text/css" rel="stylesheet" href="css/profile.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<body>
  <nav>
    <div class="login-header">
      <ul id="headermenu">
        <li><i class="fa fa-home" aria-hidden="true"></i><a href="homepage.php">Home</a></li>
        <li class="profile"><i class="fa fa-leaf"><a href="#">Products</a></i>
          <ul class="dropdown">
            <li><a href="vegetables.php">Vegetables</a></li>
            <li><a href="fruits.php">Fruits</a></li>
            <li><a href="flowers.html">Flowers</a></li>
            <li><a href="herbs.html">Exotic Herbs</a></li>
          </ul>
        </li>
        <li><i class="fa fa-info-circle"></i><a href="aboutUs.php">AboutUs</a></li>
        <li><i class="fa fa-envelope"></i><a href="ContactUs.php"> ContactUs</a></li>
        <li><i class="fa fa-shopping-cart" aria-hidden="true"><a href="#"> Cart</a></i></li>
        <li class="profile">Login
          <ul class="dropdown">
            <li><a href="cust_login.php">Customer</a></li>
            <li><a href="farmer_login.php">Farmer</a></li>
            <li><a href="admin_login.php">Admin</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  <br>
  <div class="container" style="margin-top:30px">
    <div class="row">
      <div class="col-sm-4">
        <div class="image">
          <img src="images/25.jpg" style="border-radius:100%; height:50px; width:50px;">
          <span>Hello,</span>
          <span class="fophp"><?php  echo $row['fname']?></span>
        </div>
        <br>
        <div class="section">
          <i class="bi bi-person-fill"></i> ACCOUNT SETTINGS
        </div>
        <div class="section parts">
          <a class="nav-link" href="yourprofile.php">Profile Information</a>
          <a class="nav-link" href="address.php">Manage Address</a>
          <a class="nav-link" href="pancard.php">Pan Card Information</a>
        </div>
        <hr class="d-sm-none">
      </div>
      <div class="col-sm-8">
        <div class="data">
          <b>MANAGE ADDRESS</b>
          <br>
          <span class="formphp"><?php  echo $row['address']?></span>
          <br><br>
          <button type="button" id="edit-bnt" class="btn btn-info" data-toggle="modal" data-target="#edit"> Edit </button>
        </div>
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit address</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="address.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="form-group">
                    <label class="form-label">ADDRESS</label>
                    <input type="text" class="form-control" name='address' value="<?php  echo $row['address']?>"
                      placeholder="enter your address" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                  <form action="address.php" method="POST">
                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                  </form>
                <?php
                  $before=$row['userid'];
                  if(isset($_POST['submit']))
                  {
                    $modified_address=$_POST['address'];
                    $query="UPDATE `cust_regform` set address='$modified_address' where userid= '$id'";
                    $res=mysqli_query($conn,$query);
                    echo '<script>window.location.href="address.php"</script>';
                  }   
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



</body>

</html>