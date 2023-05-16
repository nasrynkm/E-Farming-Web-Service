<?php

session_start();

@include './config.php';

if (isset($_POST['submit'])) {

  $fName = $_POST['firstName'];
  $lName = $_POST['lastName'];
  $email = $_POST['email'];
  $phone = $_POST['phoneNo'];
  $location = $_POST['location'];
  $password = $_POST['password'];
  $account = $_POST['accountType'];

  if (!empty($fName) && !empty($lName) && !empty($email) && !empty($phone) && !empty($password) && !empty($account)) {

    //CHEKING MAIL VALIDITY AND WHETHER IT EXISTS IN THE DATABASE
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

      $selecting = "SELECT email FROM users WHERE email = '$email'";
      $query1 = mysqli_query($connection, $selecting);

      //CHECKING EMAIL IF EXISTS IN THE DATABASE
      if (mysqli_num_rows($query1) > 0) {

        $errorMsg[] = "$email already exists";
      } else {
        if (isset($_FILES['image'])) {

          //SPLITITNG THE IMAGE BLOCK UPLOADED BY THE USER
          $imgName = $_FILES['image']['name'];
          $imgType = $_FILES['image']['type'];
          $tmpName = $_FILES['image']['tmp_name'];

          //DIVIDING IMAGE PARTS AND GETTING THE EXTENSIONS 
          $imgExplode = explode('.', $imgName);
          $imgExtension = end($imgExplode);

          //SETTING A POOL OF EXTENSIONS 
          $extensions = ['png', 'jpeg', 'jpg'];

          if (in_array($imgExtension, $extensions) === true) { //CHECKING EXTENSION VALIDITY
            $time = time(); //GETTING TIMESTAMP

            //ASSIGNING NEW IMAGE NAME WITH TIME OBTAINED .. THEN UPLOADING
            $newImgName = $time . $imgName;
            $targetDir = "uploaded/";

            if (move_uploaded_file($tmpName, $targetDir . $newImgName)) {

              // CREATING RANDOM ID FOR EACH USER
              $randomID = rand(time(), 10000000);

              $selecting2 = "INSERT INTO users(uniqueID, firstName, lastName, email, phone, locationed, passwords, account, profilePhoto) VALUES($randomID, '$fName', '$lName', '$email', '$phone', '$location', '$password', '$account', '$newImgName')";
              $query2 = mysqli_query($connection, $selecting2);

              if ($query2) {

                $selecting3 = "SELECT * FROM users WHERE email = '$email'";
                $query3 = mysqli_query($connection, $selecting3);

                //LOOKING FOR EXISTING MAIL AND ASSIGNING UNIQUEID TO A SESSION
                if (mysqli_num_rows($query3) > 0) {

                  $row = mysqli_fetch_assoc($query3);
                  $_SESSION['uniqueID'] = $row['uniqueID'];
                  $alert_success[] = "Account Registration Successful";
                }
              } else {
                $errorMsg[] = "Something went wrong!";
              }
            } else {
              $errorMsg[] = "Image not uploaded";
            }
          } else {
            $errorMsg[] = "Image should be a jepg, jpg, png";
          }
        } else {
          $errorMsg[] = "Please select an image file";
        }
      }
    } else {
      $errorMsg[] = "$email is an invalid email";
    }
  } else {
    $errorMsg[] = "All fields are required!";
  }
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration Form</title>
  <link rel="stylesheet" href="../css/registation.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="wrapper">
    <!-- "" -->
    <section class="containerWrapper">
      <header>Registration</header>
      <form action="#" enctype="multipart/form-data" method="post" autocomplete="off">

        <?php
        if (isset($errorMsg)) {
          foreach ($errorMsg as $errorMsg) {
            echo '<div class="error-text">' . $errorMsg . '</div>';
          }
        }
        ?>

        <div class="user-details">
          <div class="field input">
            <label for="fisrtName">First Name</label>
            <input type="text" name="firstName" placeholder="First Name" value="<?php if (isset($_POST['submit'])) {
                                                                                  echo $fName;
                                                                                } ?>" />
          </div>
          <div class="field input">
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" placeholder="Last Name" value="<?php if (isset($_POST['submit'])) {
                                                                                echo $lName;
                                                                              } ?>" />
          </div>
        </div>

        <div class="field input">
          <label for="email">Email Address</label>
          <input type="text" name="email" placeholder="Enter Email" />
        </div>
        <div class="field input">
          <label for="phoneNo">Phone Number</label>
          <input type="text" name="phoneNo" placeholder="Phone Number" value="<?php if (isset($_POST['submit'])) {
                                                                                echo $phone;
                                                                              } ?>" />
        </div>
        <div class="field input">
          <label for="location">Location</label>
          <input type="text" name="location" placeholder="Enter location" value="<?php if (isset($_POST['submit'])) {
                                                                                    echo $location;
                                                                                  } ?>" />
        </div>
        <div class="field input">
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="New password" />
          <i class="fas fa-eye"></i>
        </div>
        <div class="account">
          <!-- <label for="account">Select Account</label> -->
          <select name="accountType" class="acountSelect">
            <option value="">Acount Type</option>
            <option <?php if (isset($_POST['submit'])) {
                      if ($account == "Farmer" || $account == "farmer") {
                        echo 'selected = "selected"';
                      }
                    } ?> value="Farmer">
              Farmer
            </option>

            <option <?php if (isset($_POST['submit'])) {
                      if ($account == "Farmer" || $account == "farmer") {
                        echo 'selected = "selected"';
                      }
                    } ?> value="Customer">
              Customer
            </option>
          </select>
        </div>
        <div class="field image">
          <label for="profile">Profile Photo</label>
          <input type="file" name="image" />
        </div>

        <div class="field button">
          <input type="submit" name="submit" value="Register" />
        </div>
      </form>
      <div class="link">
        Already a user? <a href="./login.php">Log In</a>
      </div>
    </section>
  </div>

  <script src="../js/hideShowPassword.js"></script>

  <!-- SweetAlert CDN js Link and PhP file -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <?php @include './alerts.php'; ?>
</body>

</html>