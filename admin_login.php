<?php
session_start();
if(isset($_SESSION["loggedin"]))
{
    if($_SESSION["time"]<=time()){ 
    header("Location: homepage.php");
    }
    else{
        header("Location: admin.php");
    }
}
if (isset($_POST["submit"])) { 
    include("connect.php");
    $userid=$_POST['userid'];
    $password=$_POST['password'];
    $sql="SELECT * FROM `login_admin` where `userid`='$userid' and `password`='$password'";   
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        $_SESSION["loggedin"]=true;
        $_SESSION["userid"]=$userid;
        $_SESSION["time"]=time()+1400;
        header("Location: admin.php");
    }
    else{
        echo "<div class=insert>
        <strong>Error!</strong> Please check your credentials
        </div>";
    }


   /* if(strlen($userid)==0){
        $_SESSION['uerror']=true;
    }
    if(strlen($password)==0){
        $_SESSION['perror']=true;
    }*/

}

?>
<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/login_style.css"/>
    <!-- CSS only -->
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
<form id="login-form" action="admin_login.php" method="POST">
<div class="backimg">
    <div class="login-box">
        <span >Login</span>
          <br><br>
           <input  type="text" placeholder="UserId" name='userid' required>
           <br>
            <input type="password" placeholder="Password" name='password' required><br>
            <button type="submit" name='submit' class="btn">Login</button>
        </div>
     </div>
     </form>
</body>
</html>