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
//session_start();

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
        <li><i class="fa fa-home" aria-hidden="true"></i><a href="cust_middle.php">Home</a></li>
        <li><i class="fa fa-info-circle"></i><a href="aboutUs.php">AboutUs</a></li>
        <li><i class="fa fa-envelope"></i><a href="ContactUs.php"> ContactUs</a></li>
        <li><i class="fa fa-shopping-cart" aria-hidden="true"><a href="cart.php"> Cart</a></i></li>
       <li class="profile" ><i class="fa fa-user"></i>User
          <ul class="dropdown">
            <li><a href="yourprofile.php">My Profile</a></li>
            <li><a href="cust_login.php">My Orders</a></li>
            <li><a href="cust_login.php">Logout</a></li>
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
          <span class="fophp">
            <?php  echo $row['fname']?>
          </span>
        </div>
        <br>
        <div class="section">
          <i class="bi bi-person-fill"></i> ACCOUNT SETTINGS
        </div>
        <div class="section parts">
          <a class="nav-link" href="yourprofile.php">Profile Information</a>
          <a class="nav-link" href="change_psw.php">Change Password</a>
          <a class="nav-link" href="address.php">Manage Address</a>
          <a class="nav-link" href="pancard.php">Pan Card Information</a>
        </div>
        <hr class="d-sm-none">
      </div>
      <div class="col-sm-8">
        <div class="data">
          <div class='p'>
            <label><b>First Name:</b></label>
            <span class="formphp">
              <?php  echo $row['fname']?>
            </span>
          </div>
          <div class="p">
            <label><b>Last Name:</b></label>
            <span class="formphp">
              <?php  echo $row['lname']?>
            </span>
          </div>
          <div class="p">
            <label><b>Email:</b></label>
            <span class="formphp">
              <?php  echo $row['email']?>
            </span>
          </div>
          <div class="p">
            <label><b>Phone number:</b></label>
            <span class="formphp">
              <?php  echo $row['phnno']?>
            </span>
          </div>
          <button type="button" id="edit-bnt" class="btn btn-info" data-toggle="modal" data-target="#edit"> Edit
          </button>
        </div>
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="form-group">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name='fname' value="<?php  echo $row['fname']?>"
                      placeholder="enter first name" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name='lname' value="<?php  echo $row['lname']?>"
                      placeholder="enter last name" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name='email' value="<?php  echo $row['email']?>"
                      placeholder="enter email" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name='phnno' value="<?php  echo $row['phnno']?>"
                      placeholder="enter phone number" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                  <form action="yourprofile.php" method="POST">
                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button></form>
                </div>
              </form>
            </div>
          </div>     
        </div>
        <br><br>
        <p class="question">FAQs</p>
        <p class="question">What happens when I update my email address (or mobile number)?</p>
        <p class="answer">Your login email id (or mobile number) changes, likewise. You'll receive all your account
          related communication on your updated email address (or mobile number).</p>

        <p class="question">When will my MYM account be updated with the new email address (or mobile number)?</p>
        <p class="answer">It happens as soon as you confirm the verification code sent to your email (or mobile) and
          save the changes.</p>

        <p class="question">What happens to my existing MYM account when I update my email address (or mobile number)?
        </p>
        <p class="answer">Updating your email address (or mobile number) doesn't invalidate your account. Your account
          remains fully functional. You'll continue seeing your Order history, saved information and personal details.
        </p>

        <p class="question">Does my Seller account get affected when I update my email address?</p>
        <p class="answer">Make Your Market has a 'single sign-on' policy. Any changes will reflect in your Seller
          account also</p> 
      </div>
  </div>
  <?php
                    $before=$row['userid'];
                    if(isset($_POST['submit']))
                    {
                      $modified_fname=$_POST['fname'];
                      $modified_lname=$_POST['lname'];
                      $modified_email=$_POST['email'];
                      $phnno=$_POST['phnno'];
                      $query="UPDATE cust_regform set fname='$modified_fname' , lname = '$modified_lname' ,email = '$modified_email' , phnno ='$phnno' where userid='$before' ";
                      $res=mysqli_query($conn,$query);
                      echo '<script>window.location.href="yourprofile.php"</script>';
                    }
                  ?>