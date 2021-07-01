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
//$email=$_SESSION['email'];
$error=0;
if (isset($_POST["submit"])){
    $userid=$_SESSION["userid"];
    $currentpassword=$_POST["currentpassword"];
    $newpassword=$_POST["newpassword"];
    $confirmpassword=$_POST["confirmpassword"];
    include("connect.php");
    $uppercase = preg_match('@[A-Z]@', $newpassword);
  $lowercase = preg_match('@[a-z]@', $newpassword);
  $number    = preg_match('@[0-9]@', $newpassword);
  $specialChars = preg_match('@[^\w]@', $newpassword);
  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($newpassword) < 8) {
    $_SESSION['pswerror']=true;
    $error=1;
  }
 $sql=" SELECT * FROM `cust_regform` where `userid` = '$userid' ";   
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  if($num==1){
    $query="SELECT *FROM `cust_regform` WHERE `password`='$currentpassword'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_num_rows($result);
    if($row==1){
        if($error==1){
            $message='*Password should be at least 8 characters in length <br> should include at least one upper case letter, one number, and one special character';
        }
        else if($newpassword==$confirmpassword){
            $query="UPDATE `cust_regform` SET `password`='$newpassword' WHERE `userid`='$userid'";
            $result=mysqli_query($conn,$query);
            echo "<script>alert('Password changed Successfully....!')</script>"
            }
        else{
            $message="Newpassword and Confirm password not matched!";
        }
    }
    else{
       $message = "Current Password is not correct";
    }
}
}
?>
<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
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
        <li><a href="cust_middle.php">Home </a><i class="fa fa-home" aria-hidden="true"></i></li>   
    </ul>
</div><br>
<body>
    <form name="frmChange" method="post" action="change_psw.php"
        onSubmit="return validatePassword()">
        <div style="width: 500px;">
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
            <table border="0" cellpadding="10" cellspacing="0"
                width="500" align="center" class="tblSaveForm">
                <tr class="tableheader">
                    <td colspan="2">Change Password</td>
                </tr>
               <!-------- <tr>
                    <td width="40%"><label>Userid</label></td>
                    <td width="60%"><input type="text"
                        name="userid" class="txtField" /><span
                         class="required"></span></td>
                </tr>--------->
                <tr>
                    <td width="40%"><label>Current Password</label></td>
                    <td width="60%"><input type="password"
                        name="currentpassword" class="txtField" /><span
                        id="currentPassword" class="required"></span></td>
                </tr>
                
                <tr>
                    <td><label>New Password</label></td>
                    <td><input type="password" name="newpassword"
                        class="txtField" /><span id="newPassword"
                        class="required"></span></td>
                </tr>
                
                <td><label>Confirm Password</label></td>
                <td><input type="password" name="confirmpassword"
                    class="txtField" /><span id="confirmPassword"
                    class="required"></span></td>
                </tr>
        
                <tr>
                    <td colspan="2"><input type="submit" name="submit"
                        value="Submit" class="btnSubmit"></td>
                </tr>
            </table>
        </div>
    </form>

</body>
</html>