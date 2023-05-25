<?php

session_start();

if (!isset($_SESSION['uniqueID'])) {
    header("Location: ../login.php");
} else {
    @include '../config.php';

    // Get the product ID and eventDate from the POST request
    $productId = $_POST['productId'];
    $eventDate = $_POST['eventDate'];

    // Update the product table
    $updateDate = "UPDATE products SET eventDate = '$eventDate' WHERE ID = '$productId'";
    $updatedDate = mysqli_query($connection, $updateDate);


    if ($updatedDate) {
        $alert_success[] = "Product eventDate updated successfully!";
    } else {
        $alert_info[] = "Error updating product eventDate: " . $connection->error;
    }

    // Closing the database connection
    mysqli_close($connection);
}
