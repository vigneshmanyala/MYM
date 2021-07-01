<?php


/*session_start();
if(!isset($_SESSION['loggedin'])){
    header("Location: logout.php");
}
if(isset($_SESSION['loggedin']))
{
    if($_SESSION["time"]<=time()){ 
        header("Location: reg_form.php");
    }
}*/


if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname = $_POST["lname"];
    $userid = $_POST["userid"];
    $phnno = $_POST["phnno"];
    $email = $_POST["email"];
    $farmer = $_POST["farmer"];
    $address=$_POST['address'];
    $city = $_POST['city'];
    $pincode = $_POST["pincode"];
    $dst = $_POST["dst"];
    $state = $_POST["state"];
    $password = $_POST["password"];
    $rpassword = $_POST["rpassword"];
    $date=date('y/m/d');
    include("connect.php");
    //echo $fname.$lname.$userid.$phnno.$address.$pincode.$dst.$state.$password.$rpassword.$date;
  $error=0;
  if(strlen($fname)==0){
    $_SESSION['ferror']=true;
    $error=1;
  }
  else if((preg_match_all('/^[a-zA-Z]+$/', $fname))==0){
    $_SESSION['fmerror']=true;
    $error=1;
  }
  if(strlen($lname)==0){
    $_SESSION['lerror']=true;
    $error=1;
  }
  else if((preg_match_all('/^[a-zA-Z]+$/', $lname))==0){
    $_SESSION['lmerror']=true;
    $error=1;
  }
  if(strlen($userid)==0){
    $_SESSION['userr1']=true;
    $error=1;
  }
  else{
    $query="SELECT *FROM `cust_reg` WHERE `userid`='$userid'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_num_rows($result);
    if($row==0){
        $_SESSION['userr2']=true;
        $error=1;
    }
  }


  if(strlen($phnno)!=10){
    $_SESSION['phnerror']=true;
    $error=1;
  }
  else if((preg_match_all('/^[6-9][0-9]+$/', $phnno))==0){
    $_SESSION['phn2error']=true;
    $error=1;
  }
  if((preg_match('/^[a-zA-Z\d\.]+@[a-zA-Z\d]+\.[a-zA-Z\d\.]{2,}+$/',$email))==0){
    $_SESSION['emailerr']=true;
    $error=1;
  }
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $_SESSION['mail2']=true;
    $error=1;
  }
  if(strlen($farmer) == 0){
    $_SESSION['farerr']=true;
    $error=1;
  }
  if(strlen($address)==0){
    $_SESSION['aderror']=true;
    $error=1;
  }
  if(strlen($city)==0){
    $_SESSION['cterror']=true;
    $error=1;
  }
  if(strlen($pincode)==0){
    $_SESSION['pinerror']=true;
    $error=1;
  }
  
  if(strlen($state)==0){
    $_SESSION['serror']=true;
    $error=1;
  }
  if(strlen($dst)==0){
    $_SESSION['dsterror']=true;
    $error=1;
  }
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);
  $specialChars = preg_match('@[^\w]@', $password);
  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    $_SESSION['pswerror']=true;
    $error=1;
  }
  if($password != $rpassword){
    $_SESSION['rpsw'] = true;
    $error=1;
  }
  
  
 
  if($error == 0){
    $query="INSERT INTO `cust_regform` VALUES('$fname','$lname',$userid,$phnno,'$email','$farmer','$address','$city',$pincode,'$dst','$state','$password','$date')";
    $result=mysqli_query($conn,$query);
    echo "<script>alert('registered Successfully you can login now...!')</script>";
        echo "<script>window.location='cust_login.php'</script>";
  }
  }
?>



<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<link rel="stylesheet" href="css/new.css">
</head>
<body>
	<form action="reg_form.php" method="POST" align="center">
	<h1>Sign Up Now</h1>
	<br>
  <h2> Userid has been sent to ur registered email address </h2>
	<h2><u>Personal Details</u></h2>
	<label>FirstName</label>
	<input type="text" class="input-box" name="fname" placeholder="First name"/>
    <?php 
           if(isset($_SESSION['ferror'])){
                if($_SESSION['ferror']){
                    echo "<div class='first'>*Firstname cannot be empty </div>";
                    $_SESSION['ferror']=false;
                }
           }
                if(isset($_SESSION['fmerror'])){
                  if($_SESSION['fmerror']){
                    echo "<div class='first'>*Firstname includes only alphabet </div>";
                    $_SESSION['fmerror']=false;
                  }
                }
        ?>
    <br><br>
	<label>Lastname</label>
	<input type="text" class="input-box" name="lname" placeholder="Lastname"/>
    <?php 
           if(isset($_SESSION['lerror'])){
                if($_SESSION['lerror']){
                    echo "<div class='first'>*Lastname cannot be empty </div>";
                    $_SESSION['lerror']=false;
                }
           }
                if(isset($_SESSION['lmerror'])){
                  if($_SESSION['lmerror']){
                    echo "<div class='first'>*Lastname includes only alphabet </div>";
                    $_SESSION['lmerror']=false;
                  }
                }
        ?>
    <br><br>
	<label>UserId</label>
	<input type="text" class="input-box" name="userid" placeholder="UserId"/>
  <?php 
           if(isset($_SESSION['userr1'])){
                if($_SESSION['userr1']){
                    echo "<div class='first'>*Userid cannot be empty </div>";
                    $_SESSION['userr1']=false;
                }
           }
                if(isset($_SESSION['userr2'])){
                  if($_SESSION['userr2']){
                    echo "<div class='first'>*Invalid Userid </div>";
                    $_SESSION['userr2']=false;
                  }
                }
        ?>
    
    <br><br>  

	<label>Phone No</label>
	<input type="text" class="input-box" name="phnno" placeholder="phone number" size="10"/>
    <?php 
           if(isset($_SESSION['phnerror'])){
                if($_SESSION['phnerror']){
                    echo "<div class='first'>*Phone number should contain 10 digits </div>";
                    $_SESSION['phnerror']=false;
                }
           }
                if(isset($_SESSION['phn2error'])){
                  if($_SESSION['phn2error']){
                    echo "<div class='first'>*Phone number starting with 6,7,8,9 are only accepted </div>";
                    $_SESSION['phn2error']=false;
                  }
                }
        ?>
    <br><br>
	<label>Email</label>
	<input type="email" class="input-box" name="email" placeholder="Email"/>
  <?php
       if(isset($_SESSION['emailerr'])){
         if($_SESSION['emailerr']){
           echo "<div class='first'>*Invalid mail address</div>";
           $_SESSION['emailerr']=false;
         }
       }
       if(isset($_SESSION['mail2'])){
        if($_SESSION['mail2']){
          echo "<div class='first'>*Invalid mail address</div>";
          $_SESSION['emailerr']=false;
        }
      }
    ?>
    <br>
	<br>
  <label>Farmer</label> &nbsp&nbsp&nbsp&nbsp
  <input type="radio"  name="farmer"  value="yes">Yes &nbsp&nbsp&nbsp&nbsp&nbsp
  <input type="radio"  name="farmer"  value="no">No
  <?php
     if(isset($_SESSION['farerr'])){
       if($_SESSION['farerr']){
          echo "<div class='first'>*please select one</div>";
          $_SESSION['farerr']=false;
       }
     }
  ?>
  <br><br>
	<h2><u>Address</u></h2>
	<label>Address</label>
	<textarea id="Address" name="address" rows="4" cols="40"></textarea>
    <?php 
            if(isset($_SESSION['aderror'])){
              if($_SESSION['aderror']){
                  echo "<div class='first'>*Address cannot be empty </div>";
                  $_SESSION['aderror']=false;
              }
         }
      ?>
	<br><br>
  <label>City</label>
	<input type="text" class="input-box" name="city" placeholder="City"/>
    <?php
      if(isset($_SESSION['cterror'])){
                if($_SESSION['cterror']){
                    echo "<div class='first'>*City cannot be empty</div>";
                    $_SESSION['cterror']=false;
                }
           }
        ?>
    <br><br>
	<label>Pincode</label>
	<input type="text" class="input-box" name="pincode" placeholder="Pincode" size="6"/>
    <?php
      if(isset($_SESSION['pinerror'])){
                if($_SESSION['pinerror']){
                    echo "<div class='first'>*Pincode cannot be empty</div>";
                    $_SESSION['pinerror']=false;
                }
           }
        ?>
    <br><br>
	<label>District</label>
	<input type="text" class="input-box" name="dst" placeholder="District"/>
    <?php
      if(isset($_SESSION['dsterror'])){
                if($_SESSION['dsterror']){
                    echo "<div class='first'>*District cannot be empty</div>";
                    $_SESSION['dsterror']=false;
                }
           }
        ?>
    <br><br>
	<label>State</label>
	<input type="text" class="input-box" name="state" placeholder="State"/>
  <?php
      if(isset($_SESSION['serror'])){
                if($_SESSION['serror']){
                    echo "<div class='first'>*State cannot be empty</div>";
                    $_SESSION['serror']=false;
                }
           }
        ?>
    <br><br>
	<h2><u>Set Password</u></h2>
	<label>Password</label>
	<input type="Password" id="pass" class="input-box" name="password" placeholder="Password">
  <?php 
if(isset($_SESSION['pswerror'])){
                  if($_SESSION['pswerror']){
                    echo "<div class='first'>*Password should be at least 8 characters in length <br> should include at least one upper case letter, one number, and one special character </div>";
                    $_SESSION['pswerror']=false;
                  }
                }
        ?>
    <br>
	<br>
	<label>Re-type password</label>
	<input type="Password" id="repass" class="input-box" name="rpassword" placeholder="Re-type">
  <?php
   if(isset($_SESSION['rpsw'])){
     if($_SESSION['rpsw']){
       echo "<div class='first'>*Password not matched please retype </div>";
       $_SESSION['rpsw']=false;
     }
   }
  ?>
    <br>
	<br>
	<p><span><input type="checkbox"></span> I agree to the terms of services</p>
	<button type="submit" name="submit" class="signup-btn">Sign Up</button>
	<hr>
	<p class="or">OR</p>
	<div class="sign">
	<p>Do you have an account ? <a href="cust_login.php">Sign in</a></p>
	</div>
	</form>


</body>
</html>