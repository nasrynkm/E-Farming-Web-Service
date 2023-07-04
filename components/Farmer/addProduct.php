<?php

session_start();

if (!isset($_SESSION['uniqueID'])) {

  header("Location: ../login.php");
}

@include '../config.php';

//  EXTRACTING USER USING SESSION 
$query1 = "SELECT uniqueID, profilePhoto FROM users WHERE uniqueID = {$_SESSION['uniqueID']}";
$checked = mysqli_query($connection, $query1);

// CHECKING & SETTING USER CONTAINER DETAILS IN ARRAY
if (mysqli_num_rows($checked) > 0) {

  $user = mysqli_fetch_assoc($checked);
}


if (isset($_POST['addProduct'])) {

  $productName = $_POST['productName'];
  $productPrice = $_POST['productPrice'];
  $productQuantity = $_POST['productQuantity'];
  $startLimit = $_POST['sellingLimit'];
  $location = $_POST['userLocation'];
  $userRef = $_SESSION['uniqueID'];

  if (empty($productName) || empty($productPrice) || empty($productQuantity) || empty($startLimit) || empty($location)) {

    $alert_warned[] = 'Please Fill Out All Items!';
  } else {



    if (!is_numeric($productQuantity) || $productQuantity <= 0) {
      $alert_warned[] = "Product Quantity is required and should be a positive number.";
    } else if (empty($startLimit) || !is_numeric($startLimit) || $startLimit <= 0) {
      $alert_warned[] = "Selling Limit is required and should be a positive number.";
    } else if (!is_numeric($productPrice) || $productPrice <= 0) {
      $alert_warned[] = "Product Price is required and should be a positive number.";
    } else if (empty($location) || !is_string($location) || strlen($location) > 255) {
      $alert_warned[] = "User Location is required and should be a string with a maximum length of 255 characters.";
    } else {
      $post = "INSERT INTO products(Category, Price, Quantity, StartLimit, Location, userRef) VALUES('$productName', '$productPrice', '$productQuantity', '$startLimit', '$location', '$userRef')";
      $posted = mysqli_query($connection, $post);

      if ($posted) {
        $alert_success[] = 'Product Posted successfully!';
      } else {
        $alert_info[] = 'Could not Add the Product!';
      }
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
  <title>Ads Manager</title>
  <link rel="stylesheet" href="../../css/addProduct.css" />
  <link rel="stylesheet" href="../../css/footer.css" />
  <link rel="stylesheet" href="../../css/dashFarming.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD13FeUZZOZmswtOLGnbWCNcCvSGzq7Oh4&libraries=places"></script> -->
</head>

<body>
  <!-- STARTING THE HEADER SECTION -->
  <section id="header">
    <a class="logo" href="../../index/index.html">E-FARMING WS</a>

    <div>
      <ul id="navigation">
        <li><a href="./farmerDash.php">Dashboard</a></li>
        <li><a class="active" href="./addProduct.php">Ads Manager</a></li>
        <li><a href="./viewAdds.php">View Ads</a></li>
        <li><a href="../markets.php">Markets</a></li>
        <li><a href="../logout.php?logout_id=<?php echo $user['uniqueID']; ?>">Log Out</a></li>
      </ul>
    </div>

    <a href="../profile.php?userID=<?php echo $user['uniqueID']; ?>"><img class="profImg" src="../uploaded/<?php echo $user['profilePhoto']; ?>" alt="Profile" /></a>
    <div class="toggle-btn">
      <i class="fa-solid fa-bars-staggered"></i>
    </div>
  </section>
  <!-- ENDING THE HEADER SECTION -->

  <!-- STARTING THE DROP DOWN MENUS -->
  <section>
    <div class="dropMenu">
      <a href="../profile.php?userID=<?php echo $user['uniqueID']; ?>"><img class="profImg" src="../uploaded/<?php echo $user['profilePhoto']; ?>" alt="Profile" /></a>

      <ul>
        <li><a href="./farmerDash.php">Dashboard</a></li>
        <li><a class="active" href="./addProduct.php">Ads Manager</a></li>
        <li><a href="./viewAdds.php">View Ads</a></li>
        <li><a href="../markets.php">Markets</a></li>
        <li><a href="../logout.php?logout_id=<?php echo $user['uniqueID'] ?>">Log Out</a></li>
      </ul>
    </div>
  </section>
  <!-- ENDING THE DROP DOWN MENUS -->

  <!-- MAIN BODY OF ADDS SECTION -->
  <section class="productContainer">
    <div class="productForm">
      <form method="post" autocomplete="off">
        <!-- <h3>Add a new agricultural produce</h3> -->
        <select name="productName" class="itemsBox">
          <option value="">Category</option>
          <option <?php if (isset($_POST['addProduct'])) {
                    if ($productName == "Carrots") {
                      echo 'selected = "selected"';
                    }
                  } ?> value="Carrots">Carrots</option>

          <option <?php if (isset($_POST['addProduct'])) {
                    if ($productName == "Beans") {
                      echo 'selected = "selected"';
                    }
                  } ?> value="Beans">Beans</option>

          <option <?php if (isset($_POST['addProduct'])) {
                    if ($productName == "Cloves") {
                      echo 'selected = "selected"';
                    }
                  } ?> value="Cloves">Cloves</option>

          <option <?php if (isset($_POST['addProduct'])) {
                    if ($productName == "Cotton") {
                      echo 'selected = "selected"';
                    }
                  } ?> value="Cotton">Cotton</option>
          <option <?php if (isset($_POST['addProduct'])) {
                    if ($productName == "Garlic") {
                      echo 'selected = "selected"';
                    }
                  } ?> value="Garlic">Garlic</option>
          <option <?php if (isset($_POST['addProduct'])) {
                    if ($productName == "Irish Potatoes") {
                      echo 'selected = "selected"';
                    }
                  } ?> value="Irish Potatoes">Irish Potatoes</option>
          <option <?php if (isset($_POST['addProduct'])) {
                    if ($productName == "Onions") {
                      echo 'selected = "selected"';
                    }
                  } ?> value="Onions">Onions</option>
          <option <?php if (isset($_POST['addProduct'])) {
                    if ($productName == "Maize") {
                      echo 'selected = "selected"';
                    }
                  } ?> value="Maize">Maize</option>
          <option <?php if (isset($_POST['addProduct'])) {
                    if ($productName == "Rice") {
                      echo 'selected = "selected"';
                    }
                  } ?> value="Rice">Rice</option>
          <option <?php if (isset($_POST['addProduct'])) {
                    if ($productName == "Wheat Grain") {
                      echo 'selected = "selected"';
                    }
                  } ?> value="Wheat Grain">Wheat Grain</option>
          <option <?php if (isset($_POST['addProduct'])) {
                    if ($productName == "Sorghum") {
                      echo 'selected = "selected"';
                    }
                  } ?> value="Sorghum">Sorghum</option>
        </select>
        <input type="decimal" placeholder="Quantity in Kgs" name="productQuantity" class="itemsBox" value="<?php if (isset($_POST['addProduct'])) {
                                                                                                              echo $productQuantity;
                                                                                                            } ?>" />
        <input type="decimal" placeholder="Start Limit" name="sellingLimit" class="itemsBox" value="<?php if (isset($_POST['addProduct'])) {
                                                                                                      echo $startLimit;
                                                                                                    } ?>" />
        <input type="decimal" placeholder="Product Price/Start Limit" name="productPrice" class="itemsBox" value="<?php if (isset($_POST['addProduct'])) {
                                                                                                                    echo $productPrice;
                                                                                                                  } ?>" />
        <input type="text" placeholder="Your Location" name="userLocation" id="location-input" class="itemsBox" value="<?php if (isset($_POST['addProduct'])) {
                                                                                                                          echo $location;
                                                                                                                        } ?>" />

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
            <li><a href="../../index/About us/about us.html">About US</a></li>
            <li><a href="../../index/Our service/Our service.html">Services</a></li>
          </ul>
        </div>
        <div class="footerColumn">
          <h4>Support</h4>
          <ul>
            <li><a href="../../index/About us/contact us.html">Feedback</a></li>
            <li><a href="../markets.php">Markets</a></li>
          </ul>
        </div>
        <div class="footerColumn">
          <h4>Access</h4>
          <ul>
            <li><a href="./viewAdds.php">View Ads</a></li>
            <li><a href="../profile.php?userID=<?php echo $user['uniqueID'] ?>">Profile</a></li>
            <li><a href="../logout.php?logout_id=<?php echo $user['uniqueID'] ?>">Log Out</a></li>
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
  <script src="../../js/toggleButton.js"></script>

  <!-- SweetAlert CDN js Link and PhP file -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <?php @include '../alerts.php'; ?>
</body>

</html>