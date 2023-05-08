<?php
@include './config.php';


if (isset($_POST['addProduct'])) {

  $productName = $_POST['productName'];
  $productPrice = $_POST['productPrice'];
  $productQuantity = $_POST['productQuantity'];
  $startLimit = $_POST['sellingLimit'];
  $location = $_POST['userLocation'];

  if (empty($productName) || empty($productPrice) || empty($productQuantity) || empty($startLimit) || empty($location)) {
    $alert_warned[] = 'Please Fill Out All Items!';
  } else {
    $post = "INSERT INTO products(Category, Price, Quantity, StartLimit, Location) VALUES('$productName', '$productPrice', '$productQuantity', '$startLimit', '$location')";
    $posted = mysqli_query($connection, $post);

    if ($posted) {
      $alert_success[] = 'Product Posted successfully!';
    } else {
      $alert_info[] = 'Could not Add the Product!';
    }
  }
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Adds Manager</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/addProduct.css" />
  <link rel="stylesheet" href="../css/footer.css" />
  <link rel="stylesheet" href="../css/dashFarming.css" />
</head>

<body>
  <!-- STARTING THE HEADER SECTION -->
  <section id="header">
    <a class="logo" href="#">E-Farming WS</a>

    <div>
      <ul id="navigation">
        <li><a href="./farmerDash.php">Dashboard</a></li>
        <li><a class="active" href="./addProduct.php">Adds Manager</a></li>
        <li><a href="#">Adds Section</a></li>
        <li><a href="#">Log Out</a></li>
      </ul>
    </div>

    <a href=""><img class="profImg" src="../img/2021-02-00747.jpg" alt="Profile" /></a>
    <div class="toggle-btn">
      <i class="fa-solid fa-bars-staggered"></i>
    </div>
  </section>
  <!-- ENDING THE HEADER SECTION -->

  <!-- STARTING THE DROP DOWN MENUS -->
  <section>
    <div class="dropMenu">
      <a href=""><img class="profImg" src="../img/2021-02-00747.jpg" alt="Profile" /></a>

      <ul>
        <li><a class="active" href="">Dashboard</a></li>
        <li><a href="">Adds Manager</a></li>
        <li><a href="">Adds Section</a></li>
        <!-- <li><a href="">User Profile</a></li> -->
        <li><a href="">Log Out</a></li>
      </ul>
    </div>
  </section>
  <!-- ENDING THE DROP DOWN MENUS -->

  <!-- MAIN BODY OF ADDS SECTION -->
  <section class="productContainer">
    <div class="productForm">
      <form action="" method="post">
        <h3>Add a new agricultural produce</h3>
        <select name="productName" class="itemsBox">
          <option value="">Category</option>
          <option value="maize">Maize</option>
          <option value="passion">Passion</option>
          <option value="rice">Rice</option>
          <option value="banana">Banana</option>
        </select>
        <input type="decimal" placeholder="Product Price" name="productPrice" class="itemsBox" />
        <input type="decimal" placeholder="Quantity in Kgs" name="productQuantity" class="itemsBox" />
        <input type="decimal" placeholder="Start Limit" name="sellingLimit" class="itemsBox" />
        <input type="text" placeholder="Your Location" name="userLocation" class="itemsBox" />

        <input type="submit" class="submittBtn" name="addProduct" value="Post Product" />
      </form>
    </div>
  </section>
  <!-- ENDING THE MAIN BODY OF ADDS SECTION -->

  <!-- STARTING THE FOOTER OF THE PAGE -->
  <footer class="footer">
    <div class="footerContainer">
      <div class="footerRow">
        <div class="footerColumn">
          <h4>E-Farming WS</h4>
          <ul>
            <li><a href="">About US</a></li>
            <li><a href="">Services</a></li>
            <li><a href="">Privacy Policy</a></li>
          </ul>
        </div>
        <div class="footerColumn">
          <h4>Help</h4>
          <ul>
            <li><a href="">Support</a></li>
            <li><a href="">Feedback</a></li>
            <li><a href="">Contacts</a></li>
          </ul>
        </div>
        <div class="footerColumn">
          <h4>Access</h4>
          <ul>
            <li><a href="">Adds Section</a></li>
            <li><a href="../profile.html">User Profile</a></li>
            <li><a href="">Log Out</a></li>
          </ul>
        </div>
        <div class="footerColumn">
          <h4>Media</h4>
          <div class="mediaIcos">
            <a href=""><i class="fab fa-twitter"></i></a>

            <a href=""><i class="fab fa-facebook-f"></i></a>

            <a href=""><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- WHERE SCRIPTS STARTS -->
  <script src="../js/toggleButton.js"></script>

  <!-- SweetAlert CDN js Link and PhP file -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <?php @include './alerts.php'; ?>
</body>

</html>