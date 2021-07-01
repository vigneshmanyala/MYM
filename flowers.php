<!DOCTYPE html>
<html>

<head>
  <link type="text/css" link rel="stylesheet" href="css/herbs.css">
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
                  <li><a href="vegetables.php">Vegetables</a></li>
                  <li><a href="fruits.php">Fruits</a></li>
                  <li><a href="flowers.php">Flowers</a></li>
                  <li><a href="herbs.php">Exotic Herbs</a></li>
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
  <h1>Flowers</h1>
  <table>
    <tr>
      <td>
        <div class="card">
          <img src="images/hibiscus.jpg" style="width:35%">
          <h1>Hibiscus</h1>
          <p class="price">Rs.100/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/jasmine.jpg" style="width:35%">
          <h1>Jasmine</h1>
          <p class="price">Rs.40/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/lily.jpg" style="width:35%">
          <h1>Lily</h1>
          <p class="price">Rs.30/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/lotus.jpg" style="width:35%">
          <h1>Lotus</h1>
          <p class="price">Rs.60/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="card">
          <img src="images/marigold.jpg" style="width:35%">
          <h1>Marigold</h1>
          <p class="price">Rs.40/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
        </div>
      </td>
      <td>
        <div class="card">
          <img src="images/rose.jpg" style="width:35%">
          <h1>Rose</h1>
          <p class="price">Rs.35/-</p>
          <p>Per Kg</p>
          <p><button type="submit" name="submit">Add to Cart<i class="fa fa-shopping-cart"></i></button></p>
        </div>
      </td>
    </tr>
  </table>
</body>

</html>