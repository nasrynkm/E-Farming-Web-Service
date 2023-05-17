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
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['locations'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];

    if (!empty($fName) && !empty($lName) && !empty($email) && !empty($phone) && !empty($oldPassword) && !empty($newPassword)) {

      //CHEKING MAIL VALIDITY AND WHETHER IT EXISTS IN THE DATABASE
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // CHEKING WHETHER MAIL EXISTS IN THE DATABASE
        $selecting = "SELECT email FROM users WHERE email = '$email' AND  NOT uniqueID = $userID";
        $query2 = mysqli_query($connection, $selecting);

        //CHECKING EMAIL IF EXISTS IN THE DATABASE
        if (mysqli_num_rows($query2) > 0) {

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

                if ($oldPassword == $user['passwords']) {
                  // $updateImg = "UPDATE users SET profilePhoto = '$newImgName' WHERE uniqueID = $userID";
                  // $doneUpdatingImg = mysqli_query($connection, $updateImg);

                  // SENDING NEW DATA TO THE DATABASE TABLE
                  $selecting3 = "UPDATE users SET firstName = '$fName', lastName = '$lName', email = '$email', phone = '$phone', locationed = '$location', passwords = '$newPassword', profilePhoto = '$newImgName' WHERE uniqueID = $userID";
                  $query3 = mysqli_query($connection, $selecting3);

                  if ($query3) {
                    $alert_success[] = "Profile Updated Successful";
                  } else {
                    $alert_info[] = "Something went wrong!";
                  }
                } else {
                  $errorMsg[] = "Incorrect Old Password!";
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

        <div class="user-details">
          <div class="field input">
            <label for="fisrtName">First Name</label>
            <input type="text" name="fName" placeholder="First Name" value="<?php echo $user['firstName']; ?>" />
          </div>
          <div class="field input">
            <label for="lastName">Last Name</label>
            <input type="text" name="lName" placeholder="Last Name" value="<?php echo $user['lastName']; ?>" />
          </div>
        </div>

        <div class="field input">
          <label for="lastName">Email Address</label>
          <input type="text" name="email" placeholder="Enter Email" value="<?php echo $user['email']; ?>" />
        </div>
        <div class="field input">
          <label for="phoneNo">Phone Number</label>
          <input type="text" name="phone" placeholder="Phone Number" value="<?php echo $user['phone']; ?>" />
        </div>
        <div class="field input">
          <label for="password">Location</label>
          <input type="text" name="locations" placeholder="Location" value="<?php echo $user['locationed']; ?>" />
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