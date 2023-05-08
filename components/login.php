


<?php

session_start();
@include './config.php';

if (isset($_POST['submit'])) {

  $mail = $_POST['email'];
  $password = $_POST['password'];

  if (!empty($mail) && !empty($password)) {

      $selecting = "SELECT * FROM users WHERE email = '$mail' AND passwords = '$password'";
      $query1 = mysqli_query($connection, $selecting);

      if(mysqli_num_rows($query1) > 0){

        $row = mysqli_fetch_assoc($query1);
        $_SESSION['uniqueID'] = $row['uniqueID'];
        $accountType = $row['account'];

        $alert_success[] = "Log in Successful";
                  
                  // if ($alert_success && $accountType == 'Farmer') {
                  //   location: './farmerDash.php';
                  // }else{
                  //   location: "../customerDash.html";
                  // } 
      }
    
  }else{
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
    <title>Login Form</title>
    <link rel="stylesheet" href="../css/registation.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <div class="wrapper">
      <section class="containerWrapper loginWrap">
        <header>Log In</header>
        <form action="" method="post">

          <?php 
            if(isset($errorMsg)){
              foreach ($errorMsg as $errorMsg) {
                echo '<div class="error-text">'.$errorMsg.'</div>';
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
            <input type="submit" value="Log In" />
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
