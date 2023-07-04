<?php

session_start();
@include './config.php';

if (isset($_POST['submit'])) {

  $mail = $_POST['email'];
  $enteredPassword = $_POST['password'];

  if (!empty($mail) && !empty($enteredPassword)) {

    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

      $selecting = "SELECT * FROM users WHERE email = '$mail'";
      $query1 = mysqli_query($connection, $selecting);

      if ($query1) {
        if (mysqli_num_rows($query1) > 0) {

          $row = mysqli_fetch_assoc($query1);

          // DIRECTING TO THE DASH BOARD DEPENDING ON ACCOUNT TYPE
          if ($row['account'] == "Farmer" || $row['account'] == "farmer") {
            // Retrieve the stored hashed password from the database
            $storedHashedPassword = $row['passwords'];

            // Verify the entered password against the stored hashed password
            if (password_verify($enteredPassword, $storedHashedPassword)) {
              // Password is correct, proceed with login

              $_SESSION['uniqueID'] = $row['uniqueID'];
              $alert_success[] = "Log in Successful";
              header("Location: ./Farmer/farmerDash.php");
            } else {
              // Invalid password
              $alert_warned[] = "Invalid password!";
            }
          } else if ($row['account'] == "Customer" || $row['account'] == "customer") {
            // Retrieve the stored hashed password from the database
            $storedHashedPassword = $row['passwords'];

            // Verify the entered password against the stored hashed password
            if (password_verify($enteredPassword, $storedHashedPassword)) {
              // Password is correct, proceed with login
              $_SESSION['uniqueID'] = $row['uniqueID'];
              header("Location: ./Customer/customerDash.php");
            } else {
              // Invalid password
              $alert_warned[] = "Invalid password!";
            }
          } else {
            // Retrieve the stored hashed password from the database
            $storedHashedPassword = $row['passwords'];

            // Verify the entered password against the stored hashed password
            if (password_verify($enteredPassword, $storedHashedPassword)) {
              // Password is correct, proceed with login
              $_SESSION['uniqueID'] = $row['uniqueID'];
              header("Location: ../Admin/Index.php");
            } else {
              // Invalid password
              $alert_warned[] = "Invalid password!";
            }
          }
        }
      } else {
        $alert_info[] = "User with $mail does not exist!";
      }
    } else {

      $alert_error[] =  "$mail is an Invalid Email";
    }
  } else {

    $alert_warned[] = "All fields are Required!";
  }
}

?>







<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Form</title>
  <link rel="stylesheet" href="../css/registation.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="wrapper">
    <section class="containerWrapper loginWrap">
      <header>Log In</header>
      <form action="" method="post" autocomplete="off">

        <?php
        if (isset($errorMsg)) {
          foreach ($errorMsg as $errorMsg) {
            echo '<div class="error-text">' . $errorMsg . '</div>';
          }
        }
        ?>

        <div class="field input">
          <label for="lastName">Email Address</label>
          <input type="text" name="email" placeholder="Enter Email" />
        </div>
        <div class="field input">
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Enter password" />
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Log In" />
        </div>
      </form>
      <div class="link">
        Don't have account? <a href="./registration.php">Register</a>
      </div>
    </section>
  </div>

  <script src="../js/hideShowPassword.js"></script>

  <!-- SweetAlert CDN js Link and PhP file -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <?php @include './alerts.php'; ?>
</body>

</html>