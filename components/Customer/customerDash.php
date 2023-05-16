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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <section>
    <section id="header">
      <a class="logo" href="#">E-Farming WS</a>

      <div>
        <ul id="navigation">
          <li><a class="active" href="./customerDash.php">Dashboard</a></li>
          <li><a href="./viewFarmerAdds.php">View Adds</a></li>
          <li><a href="../logout.php?logout_id=<?php echo $user['uniqueID'] ?>">Log Out</a></li>
          <!-- <input type="text" placeholder="Enter text to search..." /> -->
          <!-- <button><i class="fas fa-search"></i></button> -->
        </ul>
      </div>

      <a href="../profile.html"><img class="profImg" src="../uploaded/<?php echo $user['profilePhoto'] ?>" alt="Profile" /></a>
      <div class="toggle-btn">
        <i class="fa-solid fa-bars-staggered"></i>
      </div>
    </section>

    <!-- STARTING THE DROP DOWN MENUS -->

    <section>
      <div class="dropMenu">
        <a href="../profile.html"><img class="profImg" src="../uploaded/<?php echo $user['profilePhoto'] ?>" alt="Profile" /></a>

        <ul>
          <li><a class="active" href="./customerDash.php">Dashboard</a></li>
          <li><a href="./viewFarmerAdds.php">View Adds</a></li>
          <li><a href="../logout.php?logout_id=<?php echo $user['uniqueID'] ?>">Log Out</a></li>
        </ul>
      </div>
    </section>

    <!-- STARTING THE MAIN BODY OF THE DASHBOARD -->

    <section class="pageTips">
      <!-- CONTAINER 01 -->
      <div class="containerTips containerLeft">
        <img src="../uploaded/<?php echo $user['profilePhoto'] ?>" alt="icon" />
        <div class="textBox">
          <h2>Hello <?php echo $user['firstName'] ?></h2>
          <p>
            Karibu E-Farming Web Service, kama Customer unaweza kutizama chapisho mbalimbali za wakulima kutoka kila kona ya Tanzania. Tunafurahi kua nawe.
          </p>
          <span class="leftArrow"></span>
        </div>
      </div>

      <!-- CONTAINER 02 -->
      <div class="containerTips containerRight">
        <img src="../uploaded/<?php echo $user['profilePhoto'] ?>" alt="icon" />
        <div class="textBox">
          <h2>view Adds</h2>
          <p>
            Katika kipengele hiki utakuta machapisho yote kutoka kwa wakulima mbalimbali. Hivo utaweza kuperuzi bei, idadi ya mazao, paha;li mkulima alipo na kiwango chake cha uuzaji.
          </p>
          <span class="rightArrow"></span>
        </div>
      </div>

      <!-- CONTAINER 03 -->
      <div class="containerTips containerLeft">
        <img src="../uploaded/<?php echo $user['profilePhoto'] ?>" alt="icon" />
        <div class="textBox">
          <h2>Profile Photo</h2>
          <p>
            kipengele hiki kitakupeleka kuona taarifa zako binafsi na hat kuweza kuzibadili.
          </p>
          <span class="leftArrow"></span>
        </div>
      </div>

      <!-- CONTAINER 04 -->
      <div class="containerTips containerRight">
        <img src="../uploaded/<?php echo $user['profilePhoto'] ?>" alt="icon" />
        <div class="textBox">
          <h2>Log Out</h2>
          <p>
            Hiki ni kipengele kitakacho kuwezesha kutoka katika tovuti hii ya E-Farming Web Service. Na inashauriwa kufanya hivo mara tu umemaliza shughuli zako.
          </p>
          <span class="rightArrow"></span>
        </div>
      </div>

      <!-- CONTAINER 05 -->
      <div class="containerTips containerLeft">
        <img src="../uploaded/<?php echo $user['profilePhoto'] ?>" alt="icon" />
        <div class="textBox">
          <h2>E-Farming WS</h2>
          <p>
            Ni tovuti inayokusaidia wewe Mfanyabiashara wa mazao ya kilimo na pia Mkulima katika kupata taarifa kuhusu mazao na kuwafikia wateja wengi zaidi katika sehemu mbali mbali nchini.
          </p>
          <span class="leftArrow"></span>
        </div>
      </div>

    </section>

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
              <li><a href="../profile.html">User Profile</a></li>
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