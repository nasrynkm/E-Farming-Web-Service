<?php

session_start();
@include '../config.php';

// WE HAVE TO FETCH AN EDIT ID AFTER USER HAS CLICKED
// THAT WILL BE USED IN 'WHERE' inside the query
$fetchProductID = $_GET['edit'];

if (!isset($_SESSION['uniqueID']) && !isset($fetchProductID)) {

  header("Location: ../login.php");
} else {

  if (isset($_POST['updateProduct'])) {

    $productName = $_POST['productName'];
    if (!empty($productName)) {

      $updateName = "UPDATE products SET Category = '$productName' WHERE ID = $fetchProductID";
      $updatedName = mysqli_query($connection, $updateName);

      if ($updatedName) {

        $alert_success[] = "Product Category Updated Successfully";
      } else {

        $alert_info[] = "Failed! to Update Product Category";
      }
    }

    $productQuantity = $_POST['productQuantity'];
    if (!empty($productQuantity)) {
      if (!is_numeric($productQuantity) || $productQuantity <= 0) {
        $alert_warned[] = "Product Quantity is required and should be a positive number.";
      } else {
        $updateQuantity = "UPDATE products SET Quantity = '$productQuantity' WHERE ID = $fetchProductID";
        $updatedQuantity = mysqli_query($connection, $updateQuantity);

        if ($updatedQuantity) {

          $alert_success[] = "Product Quantity Updated Successfully";
        } else {

          $alert_info[] = "Failed! to Update Product Quantity";
        }
      }
    }

    $startLimit = $_POST['sellingLimit'];
    if (!empty($startLimit)) {

      if (empty($startLimit) || !is_numeric($startLimit) || $startLimit <= 0) {
        $alert_warned[] = "Selling Limit is required and should be a positive number.";
      } else {
        $updateStartLimit = "UPDATE products SET StartLimit = '$startLimit' WHERE ID = $fetchProductID";
        $updatedStartLimit = mysqli_query($connection, $updateStartLimit);

        if ($updatedStartLimit) {

          $alert_success[] = "Start Limit Updated Successfully";
        } else {

          $alert_info[] = "Failed! to Update Start Limit";
        }
      }
    }

    $productPrice = $_POST['productPrice'];
    if (!empty($productPrice)) {

      if (!is_numeric($productPrice) || $productPrice <= 0) {
        $alert_warned[] = "Product Price is required and should be a positive number.";
      } else {
        $updatePrice = "UPDATE products SET Price = ' $productPrice' WHERE ID = $fetchProductID";
        $updatedPrice = mysqli_query($connection, $updatePrice);

        if ($updatedPrice) {

          $alert_success[] = "Product Price Updated Successfully";
        } else {

          $alert_info[] = "Failed! to Update Product Price";
        }
      }
    }

    $location = $_POST['userLocation'];
    if (!empty($location)) {

      if (empty($location) || !is_string($location) || strlen($location) > 255) {
        $alert_warned[] = "User Location is required and should be a string with a maximum length of 255 characters.";
      } else {
        $updateLocation = "UPDATE products SET Location = '$location' WHERE ID = $fetchProductID";
        $updatedLocation = mysqli_query($connection, $updateLocation);

        if ($updatedLocation) {
          $alert_success[] = "Location Updated Successfully";
        } else {
          $alert_info[] = "Failed! to Update Location";
        }
      }
    }

    $eventDate = $_POST['dateEvent'];
    if (!empty($eventDate) || !($eventDate == "01/01/1970 01:00")) {
      $updateEventDate = "UPDATE products SET eventDate = '$eventDate' WHERE ID = $fetchProductID";
      $updatedEventDate = mysqli_query($connection, $updateEventDate);

      if ($updatedEventDate) {
        $alert_success[] = "Event Date Updated Successfully";
      } else {
        $alert_info[] = "Failed! to Update Event Date";
      }
    }

    $fetchCategory = "SELECT Category FROM products WHERE ID = $fetchProductID";
    $fetchedCategory = mysqli_query($connection, $fetchCategory);

    $cat = mysqli_fetch_assoc($fetchedCategory);

    if ($productName == $cat['Category']) {
      if (empty($productPrice) && empty($productQuantity) && empty($startLimit) && empty($location) && empty($eventDate)) {
        $alert_info[] = "Nothing has been Updated!";
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
  <title>Update Adds Manager</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../css/footer.css" />
  <link rel="stylesheet" href="../../css/addProduct.css" />
  <link rel="stylesheet" href="../../css/dashFarming.css" />
</head>

<body>

  <!-- MAIN BODY OF EDIT ADD SECTION -->
  <section class="productContainer">
    <div class="productForm">
      <?php

      $fetchingItem = "SELECT * FROM products WHERE ID = $fetchProductID";
      $fetchedItems = mysqli_query($connection, $fetchingItem);

      while ($row = mysqli_fetch_assoc($fetchedItems)) {
      ?>
        <form method="post" autocomplete="off">
          <!-- <h3>Update agricultural produce</h3> -->
          <select name="productName" class="itemsBox">
            <option value="">Category</option>

            <!-- SETTING THE CATEGORY -->
            <?php $optionCat = $row['Category']; ?>

            <option value="Carrots" <?php if ($optionCat == "Carrots") echo 'selected = "selected"'; ?>>Carrots</option>
            <option value="Cinnamon" <?php if ($optionCat == "Beans") echo 'selected = "selected"'; ?>>Beans</option>
            <option value="Cloves" <?php if ($optionCat == "Cloves") echo 'selected = "selected"'; ?>>Cloves</option>
            <option value="Cotton" <?php if ($optionCat == "Cotton") echo 'selected = "selected"'; ?>>Cotton</option>
            <option value="Garlic" <?php if ($optionCat == "Garlic") echo 'selected = "selected"'; ?>>Garlic</option>
            <option value="Wheat" <?php if ($optionCat == "Irish Potatoes") echo 'selected = "selected"'; ?>>Irish Potatoes</option>
            <option value="Onions" <?php if ($optionCat == "Onions") echo 'selected = "selected"'; ?>>Onions</option>
            <option value="Maize" <?php if ($optionCat == "Maize") echo 'selected = "selected"'; ?>>Maize</option>
            <option value="Rice" <?php if ($optionCat == "Rice") echo 'selected = "selected"'; ?>>Rice</option>
            <option value="Wheat" <?php if ($optionCat == "Wheat Grain") echo 'selected = "selected"'; ?>>Wheat Grain</option>
            <option value="Wheat" <?php if ($optionCat == "Sorghum") echo 'selected = "selected"'; ?>>Sorghum</option>

          </select>
          <input type="decimal" placeholder="<?php echo $row['Quantity']; ?>" name="productQuantity" class="itemsBox" />
          <input type="decimal" placeholder="<?php echo $row['StartLimit']; ?>" name="sellingLimit" class="itemsBox" />
          <input type="decimal" placeholder="<?php echo $row['Price']; ?>" name="productPrice" class="itemsBox" />
          <input type="text" placeholder="<?php echo $row['Location']; ?>" name="userLocation" class="itemsBox" />

          <!-- STARTING YIELD TIME IF ANY USER WANTS TO SET IT -->
          <div class="event-form">
            <label for="title">
              <p>Estimated</p>
            </label>

            <?php
            $eventedDate = $row['eventDate']; // Get the event date from $row

            $formattedDateTime = date('Y-m-d\TH:i', strtotime($eventedDate)); // Format the date and time as yyyy-mm-ddTHH:ii
            ?>
            <input type="datetime-local" name="dateEvent" id="event" class="event" value="<?php echo $formattedDateTime; ?>" />
          </div>
          <!-- ENDING YIELD TIME IF ANY USER WANTS TO SET IT -->

          <input type="submit" class="submittBtn" name="updateProduct" value="Update" />
          <a href="./farmerDash.php" class="submittBtn">Go Back</a>
        </form>

      <?php }; ?>

    </div>
  </section>
  <!-- ENDING THE MAIN BODY OF EDIT ADD SECTION -->

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
          <h4>Help</h4>
          <ul>
            <li><a href="../../index/Our service/communication.html">Support</a></li>
            <!-- <li><a href="">Feedback</a></li> -->
          </ul>
        </div>
        <div class="footerColumn">
          <h4>Access</h4>
          <ul>
            <li><a href="./viewAdds.php">View Adds</a></li>
            <li><a href="../profile.php?userID=<?php echo $_SESSION['uniqueID']; ?>">Profile</a></li>

            <?php
            $logHook = "SELECT uniqueID FROM users WHERE uniqueID = {$_SESSION['uniqueID']}";
            $logQ = mysqli_query($connection, $logHook);
            $logFetch = mysqli_fetch_assoc($logQ);
            ?>
            <li><a href="../logout.php?logout_id=<?php echo $logFetch['uniqueID'] ?>">Log Out</a></li>
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
  <!-- ENDING THE FOOTER OF THE PAGE -->

  <!-- WHERE SCRIPTS STARTS -->

  <!-- SweetAlert CDN js Link and PhP file -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <?php @include '../alerts.php'; ?>
</body>

</html>