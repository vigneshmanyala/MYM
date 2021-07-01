<?php

session_start();
if(isset($_SESSION["loggedin"]))
{
    if($_SESSION["time"]<=time()){ 
    header("Location: homepage.php");
    }
    else{
        header("Location: cust_middle.php");
    }
}
//----------------login--------------//
if (isset($_POST["submit"])){  
    echo "jyo";
    include("connect.php");
    $userid=$_POST['userid'];
    $password=$_POST['password'];
    $sql="SELECT * FROM `cust_regform` where `userid`='$userid' and `password`='$password'";   
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        $_SESSION["loggedin"]=true;
        $_SESSION["user"] = 1;
        $_SESSION["userid"]=$userid;
        $_SESSION["time"]=time()+1200;
        header("Location: cust_middle.php");
    }
    else{
        echo "<div class=insert>
        <strong>Error!</strong> Please check your credentials
        </div>";
    }

}

//---------registration-----------//
if(isset($_POST['sumit'])){
    $username=$_POST['username'];
    $email = $_POST["email"];
    include("connect.php");
   if(strlen($username)==0){
       $_SESSION['uerr1']=true;
       $error=1;
   }
   else if((preg_match_all('/^[a-zA-Z]+$/', $username))==0){
    $_SESSION['uerr2']=true;
    $error=1;
  }
  if(strlen($email)==0){
      $_SESSION['mail1']=true;
      $error=1;
  }
  else{
    $query="SELECT *FROM `cust_reg` WHERE `email`='$email'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_num_rows($result);
    if($row==1){
        $_SESSION['mail2']=true;
        $error=1;
    }
  }

    $userid=rand(10000000,99999999);
    if($error==0){
    $sql="INSERT INTO `cust_reg` VALUES('$username','$email','$userid')";
    $result=mysqli_query($conn,$sql);
    
	session_start();
	$_SESSION["userid"]=$userid;
    $admail="makeyourmarket9@gmail.com";
	$sub="userid to complete your registration";
	$msg="Hey $username Your OTP is : $userid please use this during your registration";
	echo $msg;
	mail($admail,$sub,$msg);
	header("LOCATION: reg_form.php");
    }	

}




?>
<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/cust_login.css"/>
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
        <form id="login-form" method="post" action="farmer_login.php">
            <input  type="text" placeholder="UserId" name='userid' >
            <input type="password" placeholder="Password" name='password' >
            <button type="submit" name='submit' class="btn">Login</button>
            <a href="forgot_psw.php">Forgot Password</a>
        </form>
        <form  id="reg-form" method="post" action="farmer_login.php">
            <input  type="text" placeholder="Username" name='username' >
            <?php 
            if(isset($_SESSION['uerr1'])){
                if($_SESSION['uerr1']){
                    echo "<div class='first'>*Userid cannot be empty </div>";
                    $_SESSION['uerr1']=false;
                }
           }
                if(isset($_SESSION['uerr2'])){
                  if($_SESSION['uerr2']){
                    echo "<div class='first'>*Username includes only alphabet </div>";
                    $_SESSION['uerr2']=false;
                  }
                }
        ?>
            <input type="email" placeholder="Email" name='email' >
            <?php 
           if(isset($_SESSION['mail1'])){
                if($_SESSION['mail1']){
                    echo "<div class='first'>*mailid cannot be empty </div>";
                    $_SESSION['mail1']=false;
                }
           }
                if(isset($_SESSION['mail2'])){
                  if($_SESSION['mail2']){
                    echo "<div class='first'>*mailid already registered </div>";
                    $_SESSION['mail2']=false;
                  }
                }
        ?>
            <button type="submit" name='sumit' class="btn">Register  </button>
           
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