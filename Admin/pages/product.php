<?php

session_start();

if (!isset($_SESSION['uniqueID'])) {

    header("Location: ../../components/login.php");
} else {
    include "../../components/config.php";

    if (isset($_GET['delete'])) {
        $productId = $_GET['delete'];
        $deleting = "DELETE FROM products WHERE ID = $productId";
        $deletedProduct = mysqli_query($connection, $deleting);

        if ($deletedProduct) {
            $alert_success[] = "Product has been Deleted Successfully";
        } else {
            $alert_info[] = "Could not! Delete the Product";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/product.css">
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
        <div class="tebo">
            <table class="table">
                <thead>
                    <tr class="t header">
                        <th>ID </th>
                        <th>category </th>
                        <th>price </th>
                        <th>Quantity </th>
                        <th>StartLimit </th>
                        <th>Location </th>

                        <th>eventDate </th>

                        <th>action </th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                    <?php
                    $stmt = $connection->prepare("SELECT*  FROM `products` WHERE 1");
                    $stmt->execute();

                    $allproducts = $stmt->get_result();

                    $products = array();
                    while ($row = $allproducts->fetch_assoc()) {
                        $products[] = $row;
                    }
                    foreach ($products as $products) :
                    ?>
                        <div class=" content">
                            <tr class="content-details">

                                <td><?= $products['ID'] ?></td>
                                <td><?= $products['Category'] ?></td>
                                <td><?= $products['Price'] ?></td>
                                <td><?= $products['Quantity'] ?></td>
                                <td><?= $products['StartLimit'] ?></td>
                                <td><?= $products['Location'] ?></td>

                                <td><?= $products['eventDate'] ?></td>

                                <td>
                                    <a href='../components/updateProduct.php?edit=<?php echo $products['ID'] ?>' class=" update">update</a>
                                    <a href='product.php?delete=<?php echo $products['ID'] ?>' class="delete">delete</a>
                                    <!-- <a href='' class="edit">edit</a> -->
                                </td>
                            </tr>
                        </div>

                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
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