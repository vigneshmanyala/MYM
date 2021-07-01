<?php
$error=0;
if(isset($_POST['submit'])){
 $msg=$_POST['msg'];
 $name=$_POST['name'];
 $mail=$_POST['email'];
 if(strlen($msg)==0){
     $_SESSION['msgerr']=true;
     $error=1;
 }

if((preg_match('/^[a-zA-Z\d\.]+@[a-zA-Z\d]+\.[a-zA-Z\d\.]{2,}+$/',$mail))==0){
    $_SESSION['emailerr']=true;
    $error=1;
  }
  elseif(strlen($mail)==0){
      $_SESSION['mail2']=true;
  }
  if(strlen($name)==0){
    $_SESSION['lerror']=true;
    $error=1;
  }
  else if((preg_match_all('/^[a-zA-Z]+$/', $name))==0){
    $_SESSION['lmerror']=true;
    $error=1;
  }

    include("connect.php");
    $email="makeyourmarket9@gmail.com";
    $sub="Feedback from $mail";
	mail($email,$sub,$msg);
}

if($error==0){
    echo "<script>alert('Message has been sent...!')</script>";
              // echo "<script>window.location='cart.php'</script>";
}

?>


<!DOCTYPE html>
<!-- saved from url=(0061)https://preview.colorlib.com/theme/bootstrap/contact-form-17/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="./Contact Form #7_files/css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="css/bootstrap.min.css">

<link rel="stylesheet" href="css/style(1).css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.js"></script>
<title>Contact Us</title>
</head>
<body>
<nav>
  
  
        <ul>
            <li><a href="homepage.php">Home</a> <i class="fa fa-home" aria-hidden="true"></i></li>   
            <li> <a href="aboutUs.php">AboutUs</a><i class="fa fa-info-circle"></i></li>
            <li><a href="ContactUs.php">ContactUs</a><i class="fa fa-envelope"></i></li>

            
        </ul>

</nav>




<div class="content">
<div class="container">
<div class="row align-items-stretch no-gutters contact-wrap">
<div class="col-md-8">
<div class="form h-100">
<h3>Send us a message</h3>
<form class="mb-5" method="post" id="contactForm" name="contactForm" novalidate="novalidate">
<div class="row">
<div class="col-md-6 form-group mb-5">
<label for="" class="col-form-label">Name *</label>
<input type="text" class="form-control" name="name" id="name" placeholder="Your name">
<?php 
           if(isset($_SESSION['lerror'])){
                if($_SESSION['lerror']){
                    echo "<div class='first'>*Name cannot be empty </div>";
                    $_SESSION['lerror']=false;
                }
           }
                if(isset($_SESSION['lmerror'])){
                  if($_SESSION['lmerror']){
                    echo "<div class='first'>*Name includes only alphabet </div>";
                    $_SESSION['lmerror']=false;
                  }
                }
        ?>
</div>
<div class="col-md-6 form-group mb-5">
<label for="" class="col-form-label">Email *</label>
<input type="text" class="form-control" name="email" id="email" placeholder="Your email">
<?php 
           if(isset($_SESSION['emailerr'])){
                if($_SESSION['emailerr']){
                    echo "<div class='first'>*email cannot be empty </div>";
                    $_SESSION['emailerr']=false;
                }
           }
                if(isset($_SESSION['mail2'])){
                  if($_SESSION['mail2']){
                    echo "<div class='first'>*Invalid email address </div>";
                    $_SESSION['mail2']=false;
                  }
                }
        ?>
</div>
</div>
<div class="row">
<div class="col-md-12 form-group mb-5">
<label for="message" class="col-form-label">Message *</label>
<textarea class="form-control" name="msg" id="message" cols="30" rows="4" placeholder="Write your message"></textarea>
<?php 
           if(isset($_SESSION['msgerr'])){
                if($_SESSION['msgerr']){
                    echo "<div class='first'>*Message cannot be empty </div>";
                    $_SESSION['msgerr']=false;
                }
           }
    ?>

</div>
</div>
<div class="row">
<div class="col-md-12 form-group">
<input type="submit" value="Send Message" name="submit" class="btn btn-primary rounded-0 py-2 px-4">
<span class="submitting"></span>
</div>
</div>
</form>
<div id="form-message-warning mt-4"></div>
<div id="form-message-success">
Your message was sent, thank you!
</div>
</div>
</div>
<div class="col-md-4">
<div class="contact-info h-100">
<h3>Contact Information</h3>
<p class="mb-5">MAKE YOUR MARKET</p>
<p class="mb-5">Buy Farm Fresh Fruits & Vegetables
Quality Products At Best Price</p>
<ul class="list-unstyled">
<li class="d-flex">
    <span class="wrap-icon icon-room mr-3"></span>
    <span class="text">Near Three Temples Bheemunipatnam, Sanghivalasa, Visakhapatnam, Andhra Pradesh</span>
</li>
<li class="d-flex">
    <span class="wrap-icon icon-phone mr-3"></span>
    <span class="text">531162</span>
<li class="d-flex">
<span class="wrap-icon icon-phone mr-3"></span>
<span class="text"> 9381391153 9381285044 9381962863 9652660399 6302036345</span>
</li>
<li class="d-flex">
<span class="wrap-icon icon-envelope mr-3"></span>
<span class="text">sumanth.18.cse@anits.edu.in vsruthi.18.cse@anits.edu.in pnagajyothi.18.cse@anits.edu.in mvignesh.18.cse@anits.edu.in pkrishnamohan.18.cse@anits.edu.in</span>

</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<script src="jquery-3.3.1.min.js.download"></script>
<script src="popper.min.js.download"></script>
<script src="bootstrap.min.js.download"></script>
<script src="jquery.validate.min.js.download"></script>
<script src="main.js.download"></script>

</body></html>