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


  // SENDING ALL DATA TO DATABASE
  if (isset($_POST['submit'])) {

    $fName = $_POST['fName'];
    if (!empty($fName)) {

      $updatefName = "UPDATE users SET firstName = '$fName' WHERE uniqueID = $userID";
      $updatedfName = mysqli_query($connection, $updatefName);

      if ($updatedfName) {

        $alert_success[] = "First Name Updated Successfully";
      } else {

        $alert_info[] = "Failed! to Update First Name";
      }
    }

    $lName = $_POST['lName'];
    if (!empty($lName)) {

      $updatelName = "UPDATE users SET firstName = '$lName' WHERE uniqueID = $userID";
      $updatedlName = mysqli_query($connection, $updatelName);

      if ($updatedlName) {

        $alert_success[] = "Last Name Updated Successfully";
      } else {

        $alert_info[] = "Failed! to Update Last Name";
      }
    }

    $email = $_POST['email'];
    if (!empty($email)) {

      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // CHEKING WHETHER MAIL EXISTS IN THE DATABASE
        $selectMail = "SELECT email FROM users WHERE email = '$email' AND  NOT uniqueID = $userID";
        $queryMail = mysqli_query($connection, $selectMail);

        //CHECKING EMAIL IF EXISTS IN THE DATABASE
        if (mysqli_num_rows($queryMail) > 0) {

          $alert_warned[] = "$email Already Exists";
        } else {

          $updateMail = "UPDATE users SET email = '$email' WHERE uniqueID = $userID";
          $updatedMail = mysqli_query($connection, $updateMail);

          if ($updatedMail) {

            $alert_success[] = "Email Updated Successfully";
          } else {

            $alert_info[] = "Failed! to Update Email";
          }
        }
      } else {

        $alert_error[] = "$email is an Invalid Email";
      }
    }

    $phone = $_POST['phone'];
    if (!empty($phone)) {

      $updatePhone = "UPDATE users SET phone = '$phone' WHERE uniqueID = $userID";
      $updatedPhone = mysqli_query($connection, $updatePhone);

      if ($updatedPhone) {
        $alert_success[] = "Phone Number Updated Successfully";
      } else {
        $alert_info[] = "Failed! to Update Phone Number";
      }
    }

    $location = $_POST['locations'];
    if (!empty($location)) {

      $updateLocation = "UPDATE users SET locationed = '$location' WHERE uniqueID = $userID";
      $updatedLocation = mysqli_query($connection, $updateLocation);

      if ($updatedLocation) {
        $alert_success[] = "Location Updated Successfully";
      } else {
        $alert_info[] = "Failed! to Update Location";
      }
    }

    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    if (!empty($newPassword)) {
      if ($oldPassword == $user['passwords']) {

        $updatePassword = "UPDATE users SET passwords = '$newPassword' WHERE uniqueID = $userID";
        $updatedPassword = mysqli_query($connection, $updatePassword);

        if ($updatedPassword) {
          $alert_success[] = "New Password Updated Successfully";
        } else {
          $alert_info[] = "Failed! to Update New Password";
        }
      } else {
        $alert_error[] = "Old Password is Incorrect!";
      }
    }


    if (isset($_FILES['image'])) {
      //SPLITITNG THE IMAGE BLOCK UPLOADED BY THE USER
      $imgName = $_FILES['image']['name'];
      $imgType = $_FILES['image']['type'];
      $imgSize = $_FILES['image']['size'];
      $tmpName = $_FILES['image']['tmp_name'];

      //DIVIDING IMAGE PARTS AND GETTING THE EXTENSIONS 
      $imgExplode = explode('.', $imgName);
      $imgExtension = end($imgExplode);

      $time = time(); //GETTING TIMESTAMP

      //ASSIGNING NEW IMAGE NAME WITH TIME OBTAINED .. THEN UPLOADING
      $newImgName = $time . $imgName;
      $targetDir = "uploaded/";

      //SETTING A POOL OF EXTENSIONS 
      $extensions = ['png', 'jpeg', 'jpg'];

      if (!empty($imgName)) {

        if ($imgSize > 5000000) {

          $alert_warned[] = "Image Size is too large!";
        } else {

          if (in_array($imgExtension, $extensions) === true) { //CHECKING EXTENSION VALIDITY

            $updateImage = "UPDATE users SET profilePhoto = '$newImgName' WHERE uniqueID = $userID";
            $updatedImage = mysqli_query($connection, $updateImage);

            if ($updatedImage) {

              if ($user['profilePhoto']) {

                unlink("uploaded/" . $user['profilePhoto']);

                if (move_uploaded_file($tmpName, $targetDir . $newImgName)) {

                  $alert_success[] = "Image Updated Successfully";
                } else {

                  $alert_warned[] = "Failed! to Upload Image";
                }
              } else {
                if (move_uploaded_file($tmpName, $targetDir . $newImgName)) {
                  $alert_success[] = "Image Updated Successfully";
                } else {

                  $alert_warned[] = "Failed! to Upload Image";
                }
              }
            } else {
              $alert_warned[] = "Failed! to Update Image";
            }
          } else {

            $alert_warned[] = "Image Should Be jepg, jpg, png";
          }
        }
      }
    }

    if (empty($fName) && empty($lName) && empty($email) && empty($phone) && empty($location) && empty($oldPassword) && empty($newPassword) && empty($imgName)) {
      $alert_info[] = "Nothing has been Updated!";
    }
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
  <title>Update Details</title>
  <link rel="stylesheet" href="../css/registation.css" />
  <link rel="stylesheet" href="../css/footer.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="wrapper">
    <!-- "" -->
    <section class="containerWrapper">
      <header>Update Details</header>
      <form action="" method="post" enctype="multipart/form-data">
        <?php
        if (isset($errorMsg)) {
          foreach ($errorMsg as $errorMsg) {
            echo '<div class="error-text">' . $errorMsg . '</div>';
          }
        }
        ?>

        <?php
        // EXTRACTING USER USING SESSION 
        $queryAllDetails = "SELECT * FROM users WHERE uniqueID = $userID";
        $queryDetails = mysqli_query($connection, $queryAllDetails);

        // CHECKING & SETTING USER CONTAINER DETAILS IN ARRAY
        if (mysqli_num_rows($queryDetails) > 0) {

          while ($items = mysqli_fetch_assoc($queryDetails)) {
        ?>
            <div class="user-details">
              <div class="field input">
                <label for="fisrtName">First Name</label>
                <input type="text" name="fName" placeholder="<?php echo $items['firstName']; ?>" />
              </div>
              <div class="field input">
                <label for="lastName">Last Name</label>
                <input type="text" name="lName" placeholder="<?php echo $items['lastName']; ?>" />
              </div>
            </div>

            <div class="field input">
              <label for="lastName">Email Address</label>
              <input type="text" name="email" placeholder="<?php echo $items['email']; ?>" />
            </div>
            <div class="field input">
              <label for="phoneNo">Phone Number</label>
              <input type="text" name="phone" placeholder="<?php echo $items['phone']; ?>" />
            </div>
            <div class="field input">
              <label for="password">Location</label>
              <input type="text" name="locations" placeholder="<?php echo $items['locationed']; ?>" />
            </div>
            <div class="field input">
              <label for="password">Old password</label>
              <input type="text" name="oldPassword" placeholder="Old password" />
            </div>
            <div class="field input">
              <label for="confirmPassword">New Password</label>
              <input type="password" name="newPassword" placeholder="New password" />
              <i class="fas fa-eye"></i>
            </div>
            <div class="field image">
              <label for="profile">Profile Photo</label>
              <input type="file" name="image" />
            </div>

            <div class="field button">
              <input type="submit" name="submit" value="Update" />
            </div>

        <?php };
        } else {
          $alert_info[] = "Nothing was found!";
        }
        ?>
      </form>
    </section>
  </div>

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
            <li><a href="./profile.php?userID=<?php echo $user['uniqueID'] ?>">Profile</a></li>
            <li><a href="../components/<?php if ($user['account'] == 'Farmer') {
                                          echo "Farmer/farmerDash.php";
                                        } else {
                                          echo "Customer/customerDash.php";
                                        }  ?>">Dashboard</a></li>
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

  <script src="../js/hideShowPassword.js"></script>

  <!-- SweetAlert CDN js Link and PhP file -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <?php @include './alerts.php'; ?>
</body>

</html>