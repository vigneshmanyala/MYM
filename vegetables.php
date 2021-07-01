<?php
if(isset($_POST['submit'])){
  include("connect.php");
echo $_POST['prd_id'];
}


?>

<!DOCTYPE html>
<html>

<head>
  <link type="text/css" link rel="stylesheet" href="css/fruits.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.js"></script>
</head>

<body>

  <nav>
    <div class="login-header">
        <ul id="headermenu">
            <li>Home <i class="fa fa-home" aria-hidden="true"></i></li>   
            <li class="profile">Products <i class="fa fa-leaf"></i>
              <ul class="dropdown">
                  <li>Vegetables</li>
                  <li>Fruits</li>
                  <li>Flowers</li>
                  <li>Exotic Herbs</li>
              </ul>
          </li>
            <li> <a href="aboutUs.php">AboutUs</a><i class="fa fa-info-circle"></i></li>
            <li><a href="ContactUs.php">ContactUs</a><i class="fa fa-envelope"></i></li>
            <li>Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i></li>
            <li class="profile">User<i class="fa fa-user" aria-hidden="true"></i>
              <ul class="dropdown">
                 <li>Profile</li>
                 <li>My Orders</li>
                 <li>Log out</li>
              </ul> 
            </li>
            <li class="profile">login/Signup
                <ul class="dropdown">
                    <li><a href="cust_login.php">Customer</a></li>
                    <li><a href="farmer_login.php">Farmer</a></li>
                    <li><a href="admin_login.php">Admin</a></li>

                </ul>
            </li>
        </ul>
</div>
</nav>

  <h1>Vegetables</h1>
  <form method="post" action="vegetables.php">
  <!----------------
  <table>
    <tr>
      <td>
        <div class="card">
          <img src="images/barbati.jpg" style="width:35%">
          <h1>Barbati</h1>
          <p class="price">Rs.40/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=20>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/beetroot.jpg" style="width:35%">
          <h1>Beetroot</h1>
          <p class="price">Rs.40/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=21>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/bitter gourd.jpg" style="width:35%">
          <h1>Bitter Groud</h1>
          <p class="price">Rs.30/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=22>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/brinjal.jpg" style="width:35%">
          <h1>Brinjal</h1>
          <p class="price">Rs.60/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=23>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="card">
          <img src="images/cabbage.jpg" style="width:35%">
          <h1>Cabbage</h1>
          <p class="price">Rs.40/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=24>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/capsicum.jpg" style="width:35%">
          <h1>Capsicum</h1>
          <p class="price">Rs.35/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=25>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/carrot.jpg" style="width:35%">
          <h1>Carrot</h1>
          <p class="price">Rs.20/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=26>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/cauliflower.jpg" style="width:35%">
          <h1>Cauliflower</h1>
          <p class="price">Rs.50/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=27>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="card">
          <img src="images/chilli.jpg" style="width:35%">
          <h1>Chilli</h1>
          <p class="price">Rs.45/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=28>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/coriander leaves.jpg" style="width:35%">
          <h1>Coriander Leaves</h1>
          <p class="price">Rs.40/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=29>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/corn.jpg" style="width:35%">
          <h1>Corn</h1>
          <p class="price">Rs.30/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=30>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/cucumber.jpg" style="width:35%">
          <h1>Cucumber</h1>
          <p class="price">Rs.40/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=31>
        </div>
      </td>
    </tr>
    <tr>
    <td>
        <div class="card">
          <img src="images/Thotakura.jpg" style="width:35%">
          <h1>Asparagus</h1>
          <p class="price">Rs.25/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=19>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/ladies finger.jpg" style="width:35%">
          <h1>Ladies Finger</h1>
          <p class="price">Rs.40/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=32>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/onions.jpg" style="width:35%">
          <h1>Onions</h1>
          <p class="price">Rs.60/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=33>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/peas.jpg" style="width:35%">
          <h1>Peas</h1>
          <p class="price">Rs.20/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=34>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="card">
          <img src="images/plantain.jpg" style="width:35%">
          <h1>Plantain</h1>
          <p class="price">Rs.25/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=35>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/potato.jpg" style="width:35%">
          <h1>Potato</h1>
          <p class="price">Rs.45/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=36>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/pudina.jpg" style="width:35%">
          <h1>Pudina</h1>
          <p class="price">Rs.25/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=37>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/pumpkin.jpg" style="width:35%">
          <h1>Pumpkin</h1>
          <p class="price">Rs.45/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=38>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="card">
          <img src="images/radish.jpg" style="width:35%">
          <h1>Radish</h1>
          <p class="price">Rs.25/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=39>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/ridge gourd.jpg" style="width:35%">
          <h1>Ridge Gourd</h1>
          <p class="price">Rs.45/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=40>
        </div>
      </td>
      
      <td>
        <div class="card">
          <img src="images/tomato.jpg" style="width:35%">
          <h1>Tomato</h1>
          <p class="price">Rs.45/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
          <input type='hidden' name='prd_id' value=41>
        </div>
      </td>
    </tr>
  </table>--------->
  </form>
</body>

</html>