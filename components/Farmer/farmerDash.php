<?php
session_start();

if (!isset($_SESSION['uniqueID'])) {

  header("Location: ../login.php");
}

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
  mysqli_query($connection, $deleting);

  // header('location: farmerDash.php');
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
            <div>
              <div class="firstItem">
                <a href="">
                  <h2 class="allInnerItems">Carrots</h2>
                </a>
              </div>
              <div class="allItemsContainer">
                <a href="#">
                  <h2 class="allInnerItems">Cinnamon</h2>
                </a>
              </div>
              <div class="allItemsContainer">
                <a href="#">
                  <h2 class="allInnerItems">Cloves</h2>
                </a>
              </div>
              <div class="allItemsContainer">
                <a href="#">
                  <h2 class="allInnerItems">Cotton</h2>
                </a>
              </div>
              <div class="allItemsContainer">
                <a href="#">
                  <h2 class="allInnerItems">Garlic</h2>
                </a>
              </div>
              <div class="allItemsContainer">
                <a href="#">
                  <h2 class="allInnerItems">Onions</h2>
                </a>
              </div>
              <div class="allItemsContainer">
                <a href="#">
                  <h2 class="allInnerItems">Maize</h2>
                </a>
              </div>
              <div class="allItemsContainer">
                <a href="#">
                  <h2 class="allInnerItems">Rice</h2>
                </a>
              </div>
              <div class="allItemsContainer">
                <a href="#">
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
      <?php
      //FETCHING PRODUCTS CONTENTS
      $fetch = "SELECT * FROM products WHERE userRef = {$_SESSION['uniqueID']}";
      $selected = mysqli_query($connection, $fetch);

      while ($row = mysqli_fetch_assoc($selected)) {

      ?>
        <div class="addContainer">
          <div class="innerAddsContainer">
            <!-- Starting the user profile portion -->
            <div class="componentFlex1 addUserInner">
              <div><a href="#"> <?php echo $user['firstName'] . " " . $user['lastName'] ?> </a></div>
              <div>
                <h5 class="addLocation"><?php echo $row['Location'] ?></h5>
              </div>
            </div>
            <!-- Ending the user profile portion -->

            <!-- Starting the Price portion -->
            <div class="componentFlex2">
              <div class="addPriceContainer addPriceRowAlign">
                <div class="addPrice"><?php echo $row['Price'] ?></div>
                <div class="productWeight">TZS</div>
              </div>
            </div>
            <!-- Ending the Price portion -->

            <!-- Starting the Quantity Portion -->
            <div class="componentFlex3">
              <div class="amountAvailable contHeaders">
                <div class="quantityHeader">Amount:</div>
                <div><?php echo $row['Quantity'] ?> KGS</div>
              </div>
              <div class="limitComponent contHeaders">
                <div class="quantityHeader">Limit:</div>
                <div class="limitWrap">
                  <div class="weightLimitFlex">
                    <?php echo $row['StartLimit'] ?>
                    <div class="align">Kgs</div>
                  </div>
                  <div class="dashLimit">-</div>
                  <div class="weightLimitFlex">
                    <?php echo $row['Quantity'] ?>
                    <div class="align">Kgs</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Ending the Quantity Portion -->

            <!-- Starting the Contact Portion -->
            <div class="componentFlex4">
              <div class="buttonContainer">
                <button type="button" class="buttonComponent view"><a href="updateProduct.php?edit=<?php echo $row['ID'] ?>">Edit</a></button>
                <button type="button" class="buttonComponent contact"><a href="farmerDash.php?delete=<?php echo $row['ID'] ?>">Delete</a></button>
              </div>
            </div>
          </div>
        </div>
        </div>

      <?php }; ?>

      <?php
      if (mysqli_num_rows($selected) == 0) {
        echo '<h2 style = "text-align: center; padding: 10% 20%; color: white; width: 100%;">You have no adds to view yet!</h2>';
      }
      ?>

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
</body>

</html>