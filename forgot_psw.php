<?php
session_start();
/*if(!isset($_SESSION['loggedin'])){
    header("Location: logout.php");
}
if(isset($_SESSION['loggedin']))
{
    if($_SESSION["time"]<=time()){ 
        header("Location:homepage.php");
    }
}
*/


if (isset($_POST["submit"])){  
  include("connect.php");
  $email=$_POST['email'];
  
  $sql="SELECT * FROM `cust_regform` where `email`= '$email' ";   
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  if($num==1){
	$otp=rand(1000,9999);
	session_start();
	$_SESSION["otp"]=$otp;
  $_SESSION["email"]=$email;
	$sub="OTP to reset your password ";
	$msg="Your OTP is : $otp";
	echo $msg;
	mail($email,$sub,$msg);
	header("LOCATION: otp.php");
      
}
  else{
      echo "<div class=insert>
      <strong>Email address not yet registered!</strong> 
      </div>";
  }

}
?>


<!DOCTYPE html>
<html>
<head>
 <title>reset password</title>
 <link rel="stylesheet" type="text/css" href="css/forgot_psw.css" />
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.js"></script>
</head>
<body>
    <div class="login-header">
    <ul id="headermenu">
        <li><a href="ContactUs.php">contact</a><i class="fa fa-fw fa-phone"></i></li>
        <li><a href="aboutUs.php">about </a> <i class="fa fa-info-circle"></i></li>
        <li><a href="homepage.php">Home </a><i class="fa fa-home" aria-hidden="true"></i></li>   
    </ul>
</div><br>

<body>
<div>
<div id="sc-password">
  <h1>Reset Password</h1>
  <div class="sc-container">
    <form method="post" action="forgot_psw.php">
    <input type="email" name="email" placeholder="Enter your registered Email id" />
    <input type="submit" value="submit" name="submit"/>
</form>
  </div>
</div>
</div>

</body>
</html> 