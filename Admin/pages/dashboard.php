<?php

session_start();

if (!isset($_SESSION['uniqueID'])) {

  header("Location: ../../components/login.php");
} else {
  include "../../components/config.php";


  $countUser = "SELECT COUNT(*) FROM `users`";
  $runcountUser = $connection->query($countUser);
  while ($row = mysqli_fetch_array($runcountUser)) {
    // print_r($row['userId']);
    $countUsers = $row['COUNT(*)'];
  }
  $countproducts = "SELECT COUNT(*) FROM `products`";
  $runcountproducts = $connection->query($countproducts);
  while ($row = mysqli_fetch_array($runcountproducts)) {
    // print_r($row['userId']);
    $countproducts = $row['COUNT(*)'];
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>

  <div class="dashboard">
    <div class="box box-users">
      <h2>Total Users</h2>
      <span class="count"><?php echo $countUsers; ?></span>
    </div>
    <div class="box box-ads">
      <h2>Total Ads</h2>
      <span class="count"><?php echo $countproducts; ?></span>
    </div>

  </div>

  <script src="../js/script.js"></script>
</body>

</html>