<?php

session_start();

if (!isset($_SESSION['uniqueID'])) {

  header("Location: ../components/login.php");
} else {
  @include '../components/config.php';

  // EXTRACTING USER USING SESSION 
  $query1 = "SELECT * FROM users WHERE uniqueID = {$_SESSION['uniqueID']}";
  $checked = mysqli_query($connection, $query1);

  // CHECKING & SETTING USER CONTAINER DETAILS IN ARRAY
  if (mysqli_num_rows($checked) > 0) {

    $user = mysqli_fetch_assoc($checked);
  }

  $page = 'dashboard';

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body>
  <nav class="sidebar">
    <a href="../index/index.html" class="logo">E-FARMING WS</a>
    <div class="menu-content">
      <ul class="menu-items">
        <!-- <div class="menu-title">Your menu title</div>-->
        <li class="item">
          <a href="?page=dashboard">Dashboard</a>
        </li>
        <li class="item">
          <a href="?page=users">User Data</a>
        </li>
        <li class="item">
          <a href="?page=product">View Ads</a>
        </li>
      </ul>
    </div>
  </nav>
  <nav class="navbar">

    <i class="fa-solid fa-bars" id="sidebar-close"></i>
    <button class="logout-button"><a href="../components/logout.php?logout_id=<?php echo $user['uniqueID'] ?>">Log Out</a></button>
  </nav>
  <br>
  <iframe src="pages/<?= $page ?>.php" class="main" style="overflow-x:scroll; border:none;"></iframe>


  <script src="./js/script.js"></script>
</body>

</html>