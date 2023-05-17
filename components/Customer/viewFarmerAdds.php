<?php

session_start();

if (!isset($_SESSION['uniqueID'])) {

    header("Location: ../login.php");
}

@include '../config.php';

// EXTRACTING USER USING SESSION 
$query1 = "SELECT * FROM users";
$checked = mysqli_query($connection, $query1);

// CHECKING & SETTING USER CONTAINER DETAILS IN ARRAY
if (mysqli_num_rows($checked) > 0) {

    $user = mysqli_fetch_assoc($checked);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agricultural Produce Posts</title>
    <link rel="stylesheet" href="../../css/dashFarming.css" />
    <link rel="stylesheet" href="../../css/footer.css" />
    <link rel="stylesheet" href="../../css/adds.css">
    <link rel="stylesheet" href="../../css/cattings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section>
        <section id="header">
            <a class="logo" href="#">E-Farming WS</a>

            <?php
            //  EXTRACTING USER USING SESSION 
            $query1 = "SELECT uniqueID, profilePhoto FROM users WHERE uniqueID = {$_SESSION['uniqueID']}";
            $imaging = mysqli_query($connection, $query1);

            // CHECKING & SETTING IMAGE CONTAINER DETAILS IN ARRAY
            if (mysqli_num_rows($imaging) > 0) {

                $img = mysqli_fetch_assoc($imaging);
            }
            ?>

            <div>
                <ul id="navigation">
                    <li><a href="./customerDash.php">Dashboard</a></li>
                    <li><a class="active" href="./viewFarmerAdds.php">View Adds</a></li>
                    <li><a href="../logout.php?logout_id=<?php echo $img['uniqueID']; ?>">Log Out</a></li>
                    <!-- <input type="text" placeholder="Enter text to search..." /> -->
                    <!-- <button><i class="fas fa-search"></i></button> -->
                </ul>
            </div>

            <a href="../profile.php?userID=<?php echo $img['uniqueID']; ?>"><img class="profImg" src="../uploaded/<?php echo $img['profilePhoto']; ?>" alt="Profile" /></a>
            <div class="toggle-btn">
                <i class="fa-solid fa-bars-staggered"></i>
            </div>
        </section>

        <!-- STARTING THE DROP DOWN MENUS -->

        <section>
            <div class="dropMenu">
                <a href="../profile.php?userID=<?php echo $img['uniqueID']; ?>"><img class="profImg" src="../uploaded/<?php echo $img['profilePhoto']; ?>" alt="Profile" /></a>

                <ul>
                    <li><a href="./customerDash.php">Dashboard</a></li>
                    <li><a class="active" href="./viewFarmerAdds.php">View Adds</a></li>
                    <li><a href="../logout.php?logout_id=<?php echo $img['uniqueID']; ?>">Log Out</a></li>
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
            $fetch = "SELECT * FROM products";
            $selected = mysqli_query($connection, $fetch);

            while ($row = mysqli_fetch_assoc($selected)) {

            ?>

                <div class="addContainer">
                    <div class="innerAddsContainer">
                        <!-- Starting the user profile portion -->
                        <div class="componentFlex1 addUserInner">
                            <div>
                                <a href="#"><?php
                                            $names = "SELECT firstName, lastName FROM users WHERE uniqueID = {$row['userRef']}";
                                            $qnames = mysqli_query($connection, $names);
                                            $nameContainer = mysqli_fetch_assoc($qnames);
                                            echo $nameContainer['firstName'] . " " . $nameContainer['lastName'];
                                            ?>
                                </a>
                            </div>
                            <div>
                                <h5 class="addLocation"><?php echo $row['Location']; ?></h5>
                            </div>
                        </div>
                        <!-- Ending the user profile portion -->

                        <!-- Starting the Price portion -->
                        <div class="componentFlex2">
                            <div class="addPriceContainer addPriceRowAlign">
                                <div class="addPrice"><?php echo $row['Price']; ?></div>
                                <div class="productWeight">TZS</div>
                            </div>
                        </div>
                        <!-- Ending the Price portion -->

                        <!-- Starting the Quantity Portion -->
                        <div class="componentFlex3">
                            <div class="amountAvailable contHeaders">
                                <div class="quantityHeader">Amount:</div>
                                <div><?php echo $row['Quantity']; ?> KGS</div>
                            </div>
                            <div class="limitComponent contHeaders">
                                <div class="quantityHeader">Limit:</div>
                                <div class="limitWrap">
                                    <div class="weightLimitFlex">
                                        <?php echo $row['StartLimit']; ?>
                                        <div class="align">Kgs</div>
                                    </div>
                                    <div class="dashLimit">-</div>
                                    <div class="weightLimitFlex">
                                        <?php echo $row['Quantity']; ?>
                                        <div class="align">Kgs</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Ending the Quantity Portion -->

                        <!-- Starting the Contact Portion -->
                        <div class="componentFlex4">
                            <div class="buttonContainer">
                                <button type="button" class="buttonComponent view">Track</button>
                                <button type="button" class="buttonComponent contact">Contact</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            <?php }; ?>

            <?php
            if (mysqli_num_rows($selected) == 0) {
                echo '<h2 style = "text-align: center; padding: 10% 20%; color: white; width: 100%;">There are no adds to view yet!</h2>';
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
                            <li><a href="./viewFarmerAdds.php">View Adds</a></li>
                            <li><a href="../profile.php?userID=<?php echo $img['uniqueID']; ?>">Profile</a></li>
                            <li><a href="../logout.php?logout_id=<?php echo $img['uniqueID'] ?>">Log Out</a></li>
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