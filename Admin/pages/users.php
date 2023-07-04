<?php

session_start();

if (!isset($_SESSION['uniqueID'])) {

    header("Location: ../../components/login.php");
} else {
    include "../../components/config.php";

    if (isset($_GET['delete'])) {
        $userId = $_GET['delete'];
        $deleting = "DELETE FROM users WHERE userID = $userId";
        $deletedUser = mysqli_query($connection, $deleting);

        if ($deletedUser) {
            $alert_success[] = "User has been Deleted Successfully";
        } else {
            $alert_info[] = "Could not! Delete the User";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/user.css">
    <style>
        body {
            width: auto;
        }
    </style>
</head>

<body>

    <br>
    <div class="cointainer">

        <div class="title">
            <!-- <h2> User data </h2> -->
            <input type="text" class="search-input" placeholder="Search...">
            <button class="search-button">
                <i class="fas fa-search"></i>
                <span class="search-button-text">Search</span>
            </button>
        </div>


        <table class="table">


            <tr class="t header">
                <th>userID </th>

                <th>firstName </th>
                <th>lastName </th>
                <th>email </th>
                <th>phone </th>
                <th>locationed </th>

                <th>account </th>

                <th>action </th>

            </tr>

            <tbody id="userTableBody">
                <?php
                $stmt = $connection->prepare("SELECT * FROM `users` WHERE 1");
                $stmt->execute();

                $allusers = $stmt->get_result();

                $users = array();
                while ($row = $allusers->fetch_assoc()) {
                    $users[] = $row;
                }
                foreach ($users as $user) :
                ?>
                    <div class="content">
                        <tr class="content-details">

                            <td><?= $user['userID'] ?></td>

                            <td><?= $user['firstName'] ?></td>
                            <td><?= $user['lastName'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['phone'] ?></td>
                            <td><?= $user['locationed'] ?></td>

                            <td><?= $user['account'] ?></td>
                            <td>
                                <a href='../components/updateprofile.php?userID=<?php echo $user['uniqueID']; ?>' class="update">update</a>
                                <a href='users.php?delete=<?= $user['userID'] ?>' class="delete">delete</a>
                                <!-- <a href='' class="edit">edit</a> -->
                            </td>
                        </tr>
                    </div>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var searchButton = document.querySelector(".search-button");
            var searchInput = document.querySelector(".search-input");
            var tableRows = document.querySelectorAll("#userTableBody tr.content-details");

            searchButton.addEventListener("click", function() {

                var keyword = searchInput.value.toLowerCase();

                tableRows.forEach(function(row) {
                    var rowText = row.textContent.toLowerCase();

                    if (rowText.indexOf(keyword) !== -1) {
                        row.style.display = "table-row"; // Display the row if it contains the keyword
                    } else {
                        row.style.display = "none"; // Hide the row if it doesn't contain the keyword
                    }
                });
            });
        });
    </script>

    <!-- SweetAlert CDN js Link and PhP file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php @include '../../components/alerts.php'; ?>
</body>

</html>