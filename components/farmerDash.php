<?php
@include './config.php';

$fetch = "SELECT * FROM products";
$selected = mysqli_query($connection, $fetch);

if (isset($_GET['delete'])) {
  $productId = $_GET['delete'];
  $deleting = "DELETE FROM products WHERE ID = $productId";
  mysqli_query($connection, $deleting);

  header('location: farmerDash.php');
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Farmer's Dashboard</title>
    <link rel="stylesheet" href="../css/dashFarming.css" />
    <link rel="stylesheet" href="../css/pageTips.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/adds.css" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <section>
      <section id="header">
        <a class="logo" href="#">E-Farming WS</a>

        <div>
          <ul id="navigation">
            <li><a class="active" href="./farmerDash.php">Dashboard</a></li>
            <li><a href="./addProduct.php">Adds Manager</a></li>
            <li><a href="#">Adds Section</a></li>
            <li><a href="#">Log Out</a></li>
          </ul>
        </div>

        <a href=""
          ><img class="profImg" src="../img/2021-02-00747.jpg" alt="Profile"
        /></a>
        <div class="toggle-btn">
          <i class="fa-solid fa-bars-staggered"></i>
        </div>
    </section>

      <!-- STARTING THE DROP DOWN MENUS -->

      <section>
        <div class="dropMenu">
          <a href=""
            ><img class="profImg" src="./img/2021-02-00747.jpg" alt="Profile"
          /></a>

          <ul>
            <li><a class="active" href="">Dashboard</a></li>
            <li><a href="addProduct.html">Adds Manager</a></li>
            <li><a href="">Adds Section</a></li>
            <!-- <li><a href="">User Profile</a></li> -->
            <li><a href="">Log Out</a></li>
          </ul>
        </div>
      </section>

      <!-- STARTING THE MAIN BODY OF THE DASHBOARD -->
    <section>
      <?php
      while ($row = mysqli_fetch_assoc($selected)) {

      ?>
      <div class="addContainer">
        <div class="innerAddsContainer">
          <!-- Starting the user profile portion -->
          <div class="componentFlex1 addUserInner">
            <div><a href="#">Naseeb Nasry</a></div>
            <div><h5 class="addLocation"><?php echo $row['Location'] ?></h5></div>
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
    </section>
      <!-- ENDING THE MAIN BODY OF THE DASHBOARD -->

     
    </section>


    <script src="../js/toggleButton.js"></script>
  </body>
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
                <li><a href="addProduct.php">Adds Section</a></li>
                <li><a href="">User Profile</a></li>
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
</html>
