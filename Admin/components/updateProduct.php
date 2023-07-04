<?php

session_start();
@include './../../components/config.php';

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

    $productPrice = $_POST['productPrice'];
    if (!empty($productPrice)) {

      $updatePrice = "UPDATE products SET Price = ' $productPrice' WHERE ID = $fetchProductID";
      $updatedPrice = mysqli_query($connection, $updatePrice);

      if ($updatedPrice) {

        $alert_success[] = "Product Price Updated Successfully";
      } else {

        $alert_info[] = "Failed! to Update Product Price";
      }
    }

    $productQuantity = $_POST['productQuantity'];
    if (!empty($productQuantity)) {

      $updateQuantity = "UPDATE products SET Quantity = '$productQuantity' WHERE ID = $fetchProductID";
      $updatedQuantity = mysqli_query($connection, $updateQuantity);

      if ($updatedQuantity) {

        $alert_success[] = "Product Quantity Updated Successfully";
      } else {

        $alert_info[] = "Failed! to Update Product Quantity";
      }
    }

    $startLimit = $_POST['sellingLimit'];
    if (!empty($startLimit)) {

      $updateStartLimit = "UPDATE products SET StartLimit = '$startLimit' WHERE ID = $fetchProductID";
      $updatedStartLimit = mysqli_query($connection, $updateStartLimit);

      if ($updatedStartLimit) {

        $alert_success[] = "Start Limit Updated Successfully";
      } else {

        $alert_info[] = "Failed! to Update Start Limit";
      }
    }

    $location = $_POST['userLocation'];
    if (!empty($location)) {

      $updateLocation = "UPDATE products SET Location = '$location' WHERE ID = $fetchProductID";
      $updatedLocation = mysqli_query($connection, $updateLocation);

      if ($updatedLocation) {
        $alert_success[] = "Location Updated Successfully";
      } else {
        $alert_info[] = "Failed! to Update Location";
      }
    }

    $eventDate = $_POST['dateEvent'];
    if (!empty($eventDate)) {
      $updateEventDate = "UPDATE products SET eventDate = '$eventDate' WHERE ID = $fetchProductID";
      $updatedEventDate = mysqli_query($connection, $updateEventDate);

      // if ($updatedEventDate) {
      //   $alert_success[] = "Event Date Updated Successfully";
      // } else {
      //   $alert_info[] = "Failed! to Update Event Date";
      // }
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
            <option value="Cinnamon" <?php if ($optionCat == "Cinnamon") echo 'selected = "selected"'; ?>>Cinnamon</option>
            <option value="Cloves" <?php if ($optionCat == "Cloves") echo 'selected = "selected"'; ?>>Cloves</option>
            <option value="Cotton" <?php if ($optionCat == "Cotton") echo 'selected = "selected"'; ?>>Cotton</option>
            <option value="Garlic" <?php if ($optionCat == "Garlic") echo 'selected = "selected"'; ?>>Garlic</option>
            <option value="Onions" <?php if ($optionCat == "Onions") echo 'selected = "selected"'; ?>>Onions</option>
            <option value="Maize" <?php if ($optionCat == "Maize") echo 'selected = "selected"'; ?>>Maize</option>
            <option value="Rice" <?php if ($optionCat == "Rice") echo 'selected = "selected"'; ?>>Rice</option>
            <option value="Wheat" <?php if ($optionCat == "Wheat") echo 'selected = "selected"'; ?>>Wheat</option>


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
          <!-- <a href="./farmerDash.php" class="submittBtn">Go Back</a> -->
        </form>

      <?php }; ?>

    </div>
  </section>
  <!-- ENDING THE MAIN BODY OF EDIT ADD SECTION -->

  <!-- WHERE SCRIPTS STARTS -->

  <!-- SweetAlert CDN js Link and PhP file -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <?php @include '../../components/alerts.php'; ?>
</body>

</html>