<?php

if(isset($_POST['submit'])){
    $userid=$_POST['userid'];
    $password = $_POST["password"];
    include("connect.php");
    $query="INSERT INTO `farmer_regform` VALUES('$userid','$password')";
    $result=mysqli_query($conn,$query);
}





?>
<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/login_style.css">
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
<div class="backimg">
    <div class="login-box">
        <div class="form-btn">
        <span onclick="login()">Login</span>
        <span onclick="register()">Register</span>
        <hr id="indicator">
        </div>
        <form id="login-form">
            <input  type="text" placeholder="UserId" name='userid' required>
            <input type="password" placeholder="Password" name='password' required>
            <button type="submit" class="btn">Login</button>
            <a href="">Forgot Password</a>
        </form>
        <form  id="reg-form">
            <input  type="text" placeholder="Username" required>
            <input type="email" placeholder="Email" required>
            <button type="submit" name='submit' class="btn">  <a href="reg_form.php">Register </a> </button>
           
        </form>
    </div>
</div>
<script>
    var loginform = document.getElementById("login-form");
    var regform = document.getElementById("reg-form");
    var indicator= document.getElementById("indicator");
    function login(){
        regform.style.transform="translateX(350px)";
        loginform.style.transform="translateX(350px)";
        indicator.style.transform="translateX(0px)";
    }
    function register(){
        regform.style.transform="translateX(0px)";
        loginform.style.transform="translateX(0px)";
        indicator.style.transform="translateX(100px)";
    }
</script>
</body>
</html>