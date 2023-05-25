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
    <link rel="stylesheet" href="../../css/count.css">
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
                        <div class="cropJs">
                            <div class="firstItem">
                                <a onclick="fetchProducts('Carrots')">
                                    <h2 class="allInnerItems">Carrots</h2>
                                </a>
                            </div>
                            <div class="allItemsContainer">
                                <a onclick="fetchProducts('Cinnamon')">
                                    <h2 class="allInnerItems">Cinnamon</h2>
                                </a>
                            </div>
                            <div class="allItemsContainer">
                                <a onclick="fetchProducts('Cloves')">
                                    <h2 class="allInnerItems">Cloves</h2>
                                </a>
                            </div>
                            <div class="allItemsContainer">
                                <a onclick="fetchProducts('Cotton')">
                                    <h2 class="allInnerItems">Cotton</h2>
                                </a>
                            </div>
                            <div class="allItemsContainer">
                                <a onclick="fetchProducts('Garlic')">
                                    <h2 class=" allInnerItems">Garlic</h2>
                                </a>
                            </div>
                            <div class="allItemsContainer">
                                <a onclick="fetchProducts('Onions')">
                                    <h2 class="allInnerItems">Onions</h2>
                                </a>
                            </div>
                            <div class="allItemsContainer">
                                <a onclick="fetchProducts('Maize')">
                                    <h2 class="allInnerItems">Maize</h2>
                                </a>
                            </div>
                            <div class="allItemsContainer">
                                <a onclick="fetchProducts('Rice')">
                                    <h2 class="allInnerItems">Rice</h2>
                                </a>
                            </div>
                            <div class="allItemsContainer">
                                <a onclick="fetchProducts('Wheat')">
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

    <script src="../../js/toggleButton.js" async></script>
    <script src="../../js/cropMenu.js" async></script>
    <script src="../../js/adds.js" defer></script>

    <!-- <script src="../../js/addsDash.js" defer></script> -->


</body>

</html>