<?php
session_start();

if (!isset($_SESSION['uniqueID'])) {

  header("Location: ../login.php");
} else {
  @include '../config.php';

  // EXTRACTING USER USING SESSION 
  $query1 = "SELECT * FROM users WHERE uniqueID = {$_SESSION['uniqueID']}";
  $checked = mysqli_query($connection, $query1);

  // CHECKING & SETTING USER CONTAINER DETAILS IN ARRAY
  if (mysqli_num_rows($checked) > 0) {

    $user = mysqli_fetch_assoc($checked);
  }

  if (isset($_GET['delete'])) {
    $productId = $_GET['delete'];
    $deleting = "DELETE FROM products WHERE ID = $productId";
    $deletedProduct = mysqli_query($connection, $deleting);

    if ($deletedProduct) {
      $alert_success[] = "Product has been Deleted Successfully";
    } else {
      $alert_info[] = "Could not! Delete the Prodct";
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
  <title>Farmer's Dashboard</title>
  <link rel="stylesheet" href="../../css/dashFarming.css" />
  <link rel="stylesheet" href="../../css/pageTips.css" />
  <link rel="stylesheet" href="../../css/footer.css" />
  <link rel="stylesheet" href="../../css/adds.css" />
  <link rel="stylesheet" href="../../css/cattings.css">
  <link rel="stylesheet" href="../../css/count.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <section>
    <section id="header">



      <a class="logo" href="#">E-Farming WS</a>

      <div>
        <ul id="navigation">
          <li><a class="active" href="./farmerDash.php">Dashboard</a></li>
          <li><a href="./addProduct.php">Adds Manager</a></li>
          <li><a href="./viewAdds.php">View Adds</a></li>
          <li><a href="../logout.php?logout_id=<?php echo $user['uniqueID'] ?>">Log Out</a></li>
        </ul>
      </div>

      <a href="../profile.php?userID=<?php echo $user['uniqueID']; ?>"><img class="profImg" src="../uploaded/<?php echo $user['profilePhoto'] ?>" alt="Profile" /></a>
      <div class="toggle-btn">
        <i class="fa-solid fa-bars-staggered"></i>
      </div>
    </section>

    <!-- STARTING THE DROP DOWN MENUS -->
    <section>
      <div class="dropMenu">
        <a href="../profile.php?userID=<?php echo $user['uniqueID']; ?>"><img class="profImg" src="../uploaded/<?php echo $user['profilePhoto'] ?>" alt="Profile" /></a>

        <ul>
          <li><a class="active" href="./farmerDash.php">Dashboard</a></li>
          <li><a href="./addProduct.php">Adds Manager</a></li>
          <li><a href="./viewAdds.php">View Adds</a></li>
          <!-- <li><a href="">User Profile</a></li> -->
          <li><a href="../logout.php?logout_id=<?php echo $user['uniqueID'] ?>">Log Out</a></li>
        </ul>
      </div>
    </section>
    <!-- ENDING THE DROP DOWN MENUS -->

    <!-- STARTING THE CROP NAVIGATION -->
    <div class="cropContainer">
      <div class="cropInnerContainer">
        <div class="cropInnerInnercontainer">
          <div class="innerDivItems">
            <div class="cropJs">
              <div class="firstItem">
                <a onclick="fetchProducts('Carrots', '<?php echo $user['uniqueID'] ?>')">
                  <h2 class="allInnerItems">Carrots</h2>
                </a>
              </div>
              <div class="allItemsContainer">
                <a onclick="fetchProducts('Cinnamon', '<?php echo $user['uniqueID'] ?>')">
                  <h2 class="allInnerItems">Cinnamon</h2>
                </a>
              </div>
              <div class="allItemsContainer">
                <a onclick="fetchProducts('Cloves', '<?php echo $user['uniqueID'] ?>')">
                  <h2 class="allInnerItems">Cloves</h2>
                </a>
              </div>
              <div class="allItemsContainer">
                <a onclick="fetchProducts('Cotton', '<?php echo $user['uniqueID'] ?>')">
                  <h2 class="allInnerItems">Cotton</h2>
                </a>
              </div>
              <div class="allItemsContainer">
                <a onclick="fetchProducts('Garlic', '<?php echo $user['uniqueID'] ?>')">
                  <h2 class=" allInnerItems">Garlic</h2>
                </a>
              </div>
              <div class="allItemsContainer">
                <a onclick="fetchProducts('Onions', '<?php echo $user['uniqueID'] ?>')">
                  <h2 class="allInnerItems">Onions</h2>
                </a>
              </div>
              <div class="allItemsContainer">
                <a onclick="fetchProducts('Maize', '<?php echo $user['uniqueID'] ?>')">
                  <h2 class="allInnerItems">Maize</h2>
                </a>
              </div>
              <div class="allItemsContainer">
                <a onclick="fetchProducts('Rice', '<?php echo $user['uniqueID'] ?>')">
                  <h2 class="allInnerItems">Rice</h2>
                </a>
              </div>
              <div class="allItemsContainer">
                <a onclick="fetchProducts('Wheat', '<?php echo $user['uniqueID'] ?>')">
                  <h2 class="allInnerItems">Wheat</h2>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ENDING THE CROP NAVIGATIONS -->

    <!-- STARTING THE MAIN BODY OF THE DASHBOARD -->
    <section class="addswidth">

    </section>
    <!-- ENDING THE MAIN BODY OF THE DASHBOARD -->


    <!-- STARTING THE FOOTER OF THE PAGE -->
    <footer class="footer">
      <div class="footerContainer">
        <div class="footerRow">
          <div class="footerColumn">
            <h4>E-Farming WS</h4>
            <ul>
              <li><a href="">About US</a></li>
              <li><a href="">Services</a></li>
              <!-- <li><a href="">Privacy Policy</a></li> -->
            </ul>
          </div>
          <div class="footerColumn">
            <h4>Help</h4>
            <ul>
              <li><a href="">Support</a></li>
              <li><a href="">Feedback</a></li>
              <!-- <li><a href="">Contacts</a></li> -->
            </ul>
          </div>
          <div class="footerColumn">
            <h4>Access</h4>
            <ul>
              <li><a href="./viewAdds.php">View Adds</a></li>
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
  </section>


  <script src="../../js/toggleButton.js"></script>
  <script src="../../js/cropMenu.js"></script>
  <script src="../../js/addsDash.js" defer></script>
  <!-- <script src="../../js/dateEvent.js"></script> -->

  <!-- SweetAlert CDN js Link and PhP file -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <?php @include '../alerts.php'; ?>

</body>

</html>