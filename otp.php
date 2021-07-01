<?php
session_start();




if (isset($_POST["submit"])){  
  include("connect.php");
  $otp=$_POST['otp'];
	if ($_SESSION["otp"]==$otp){
        header("LOCATION: change_password.php");
    }

      

  else{
      echo "<div class=insert>
      <strong>Inavlid otp!</strong>
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
  <h3>otp has been sent to your registered email id</h3>
  <div class="sc-container">
    <form method="post" action="otp.php">
    <input type="text" name="otp" placeholder="Enter otp" />
    <input type="submit" value="submit" name="submit"/>
</form>
  </div>
</div>
</div>

</body>
</html> 