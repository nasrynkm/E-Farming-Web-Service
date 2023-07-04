<?php
session_start();
@include "./config.php";

$userID = mysqli_real_escape_string($connection, $_GET['userID']);

if (isset($_SESSION['uniqueID']) && isset($userID)) {
  // WHEN SESSION IS SET START...


  // EXTRACTING USER USING SESSION 
  $query1 = "SELECT * FROM users WHERE uniqueID = $userID";
  $checked = mysqli_query($connection, $query1);

  // CHECKING & SETTING USER CONTAINER DETAILS IN ARRAY
  if (mysqli_num_rows($checked) > 0) {

    $user = mysqli_fetch_assoc($checked);
  }
} else {
  // WHEN NO SESSION AND ONE IS TO ACCESS THIS PAGE IS DIRECTED TO...
  header("Location: ./login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Profile</title>
  <link rel="stylesheet" href="../css/registation.css" />
  <link rel="stylesheet" href="../css/addProduct.css" />
  <link rel="stylesheet" href="../css/footer.css" />
  <link rel="stylesheet" href="../css/dashFarming.css">
</head>

<body>
  <!-- BEGINS THE USER PROFILE -->
  <div class="wrapper">
    <section class="containerWrapper">
      <header>Profile ID: <?php echo $user['uniqueID']; ?></header>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="field input">
            <label for="fisrtName">First Name</label>
            <input type="text" placeholder="First Name" value="<?php echo $user['firstName']; ?>" />
          </div>
          <div class="field input">
            <label for="lastName">Last Name</label>
            <input type="text" placeholder="Last Name" value="<?php echo $user['lastName']; ?>" />
          </div>
        </div>

        <div class="field input">
          <label for="lastName">Email Address</label>
          <input type="text" placeholder="Email Address" value="<?php echo $user['email']; ?>" />
        </div>
        <div class="field input">
          <label for="phoneNo">Phone Number</label>
          <input type="text" placeholder="Phone Number" value="<?php echo $user['phone']; ?>" />
        </div>
        <div class="field input">
          <label for="location">Location</label>
          <input type="text" name="location" placeholder="Location" value="<?php echo $user['locationed']; ?>" />
        </div>
        <div class="field input">
          <label for="password">Password</label>
          <input type="password" placeholder="Password" value="<?php echo $user['passwords']; ?>" />
        </div>
        <div class="account">
          <select name="accountType" class="acountSelect">
            <option value="">Acount Type</option>
            <option <?php if ($user['account'] == "Farmer" || $user['account'] == "farmer") {
                      echo 'selected = "selected"';
                    }
                    ?> value="Farmer">
              Farmer
            </option>

            <option <?php if ($user['account'] == "Customer" || $user['account'] == "customer") {
                      echo 'selected = "selected"';
                    }
                    ?> value="Customer">
              Customer
            </option>
          </select>
        </div>
        <div class="field image">
          <!-- <label for="profile">Profile Photo</label>
          <input type="file" name=" <?php echo $user['profilePhoto']; ?>" /> -->
          <!-- <img class="profImg" src="./uploaded/<?php echo $user['profilePhoto'] ?>" alt="Profile" /> -->
        </div>

        <div><a class="submittBtn" href="./updateprofile.php?userID=<?php echo $user['uniqueID']; ?>">Edit</a></div>
      </form>
    </section>
  </div>
  <!-- ENDS THE USER PROFILE -->

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
            <li><a href="../components/<?php if ($user['account'] == 'Farmer') {
                                          echo "Farmer/farmerDash.php";
                                        } else {
                                          echo "Customer/customerDash.php";
                                        }  ?>">Dashboard</a></li>
            <!-- <li><a href="./profile.html">User Profile</a></li> -->
            <li><a href="./logout.php?logout_id=<?php echo $user['uniqueID'] ?>">Log Out</a></li>
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
</body>

</html>