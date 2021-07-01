<?php
/*
session_start();
if(!isset($_SESSION['loggedin'])){
    header("Location: logout.php");
}
if(isset($_SESSION['loggedin']))
{
    if($_SESSION["time"]<=time()){ 
        header("Location: form.php");
    }
}
*/


if(isset($_POST['submit'])){
  $fname=$_POST['fname'];
  $lname = $_POST["lname"];
  $phnno = $_POST["phnno"];
  $userid = $_POST["userid"];
  $password = $_POST["password"];
  $address=$_POST['address'];
  $country = $_POST["country"];
  $state = $_POST["state"];
  $dst = $_POST["dst"];
  $pincode = $_POST["pincode"];
  $date=date('y/m/d');
  echo $fname.$lname.$phnno.$userid.$password.$address.$country.$state.$dst.$pincode.$date;

$error=0;
if(strlen($fname)==0){
  $error=1;
  $_SESSION['ferror']=true;
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
if(strlen($phnno)!=10){
  $_SESSION['phnerror']=true;
  $error=1;
}
else if((preg_match_all('/^[6-9][0-9]+$/', $phnno))==0){
  $_SESSION['phn2error']=true;
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


if(strlen($address)==0){
  $_SESSION['aderror']=true;
  $error=1;
}
if(strlen($country)==0){
  $_SESSION['cerror']=true;
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
if(strlen($pincode)==0){
  $_SESSION['pinerror']=true;
  $error=1;
}

include("connect.php");
if($error == 0){
  $query="INSERT INTO `farmer_regform` VALUES('$fname','$lname',$phnno,'$userid','$password','$address','$country','$state','$dst',$pincode,'$date')";
  $result=mysqli_query($conn,$query);
}


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
  <link rel="stylesheet" href="css/form.css">
  <script>
    var stateObject = {
      "India": {
        "Delhi": ["new Delhi", "North Delhi"],
        "Kerala": ["Thiruvananthapuram", "Palakkad"],
        "Goa": ["North Goa", "South Goa"],
      }
    }
    window.onload = function () {
      var countySel = document.getElementById("countySel"),
        stateSel = document.getElementById("stateSel"),
        a
      districtSel = document.getElementById("districtSel");
      for (var country in stateObject) {
        countySel.options[countySel.options.length] = new Option(country, country);
      }
      countySel.onchange = function () {
        stateSel.length = 1; // remove all options bar first
        districtSel.length = 1; // remove all options bar first
        if (this.selectedIndex < 1) return; // done
        for (var state in stateObject[this.value]) {
          stateSel.options[stateSel.options.length] = new Option(state, state);
        }
      }
      countySel.onchange(); // reset in case page is reloaded
      stateSel.onchange = function () {
        districtSel.length = 1; // remove all options bar first
        if (this.selectedIndex < 1) return; // done
        var district = stateObject[countySel.value][this.value];
        for (var i = 0; i < district.length; i++) {
          districtSel.options[districtSel.options.length] = new Option(district[i], district[i]);
        }
      }
    }
  </script>

<body class="bdy">
  <div>
    <form class="regform" action="form.php" method="POST">

      <br>
      <label for="fname">First name*</label><br>
      <input type="text"  name="fname" class="box" placeholder="Enter First Name"><br><br>
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
      <label for="lname">Last name*</label>
      <input type="text"  name="lname" class="box" placeholder="Enter Last Name"><br><br>
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

      <label for="phoneno">Phone Number*</label>
      <input type="text"  name="phnno" class="box" placeholder="Enter Your Number"><br><br>
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

      <label for="userid">User ID*</label>
      <input type="text"  name="userid" class="box" placeholder="Enter the ID"><br><br>

      <div class="pass">
        <label for="pass">Password* </label>
        <input type="password" class="box" name="password" id="pass" placeholder="Password">
        <?php 
if(isset($_SESSION['pswerror'])){
                  if($_SESSION['pswerror']){
                    echo "<div class='first'>*Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character </div>";
                    $_SESSION['pswerror']=false;
                  }
                }
        ?>
      </div>
      <br>


      <div class="repass">
        <label for="repass">Renter-Password* </label>
        <input type="password" class="box" name="repass" id="repass" placeholder="Password">
      </div>
      <br>

      <label for="address">Address* </label><br>
      <textarea name="address" rows="2" cols="20"></textarea><br><br>
      <?php 
            if(isset($_SESSION['aderror'])){
              if($_SESSION['aderror']){
                  echo "<div class='first'>*Address cannot be empty </div>";
                  $_SESSION['aderror']=false;
              }
         }
      ?>
      <label>Country*</label> <select name="country" id="countySel" class="box" size="1">
        <option value="" selected="selected">Select Country</option>
      </select>
      <?php
      if(isset($_SESSION['cerror'])){
                if($_SESSION['cerror']){
                    echo "<div class='first'>*Country cannot be empty</div>";
                    $_SESSION['cerror']=false;
                }
           }
        ?>
      <br>
      <br>
      <label>State*</label><select name="state" id="stateSel" class="box" size="1">
        <option value="" selected="selected">Please select Country first</option>
      </select>
      <?php
      if(isset($_SESSION['serror'])){
                if($_SESSION['serror']){
                    echo "<div class='first'>*State cannot be empty</div>";
                    $_SESSION['serror']=false;
                }
           }
        ?>
      <br>
      <br>
      <label>District*</label><select name="dst" id="districtSel" class="box" size="1">
        <option value="" selected="selected">Please select State first</option>
      </select>
      <?php
      if(isset($_SESSION['dsterror'])){
                if($_SESSION['dsterror']){
                    echo "<div class='first'>*District cannot be empty</div>";
                    $_SESSION['dsterror']=false;
                }
           }
        ?>

      <br><br>
      <label for="pincode">Pin Code*</label>
      <input type="text" name="pincode" class="box">
      <?php
      if(isset($_SESSION['pinerror'])){
                if($_SESSION['pinerror']){
                    echo "<div class='first'>*Pincode cannot be empty</div>";
                    $_SESSION['pinerror']=false;
                }
           }
        ?>
      <br>
    <button type="submit" name="submit"> SUBMIT</button>
  </form>
  </div>
</body>
<!--#e52165 and #0d1137-->

</html>