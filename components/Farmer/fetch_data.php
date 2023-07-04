<?php

session_start();

if (!isset($_SESSION['uniqueID'])) {
    header("Location: ../login.php");
} else {
    @include '../config.php';

    // Fetching data based on the provided category and -userRef-
    if (isset($_GET['category'])) {
        $category = $_GET['category'];

        // Preparing the SQL query with a parameterized statement
        $fetch = "SELECT p.*, u.firstName, u.lastName, u.profilePhoto, u.email, u.phone, u.locationed FROM products p JOIN users u ON p.userRef = u.uniqueID WHERE p.Category = ?";

        // Checking if userRef is provided
        if (isset($_GET['userRef'])) {
            $userRef = $_GET['userRef'];
            $fetch .= " AND p.userRef = ?";
            $statement = mysqli_prepare($connection, $fetch);
            mysqli_stmt_bind_param($statement, "ss", $category, $userRef);
        } else {
            $statement = mysqli_prepare($connection, $fetch);
            mysqli_stmt_bind_param($statement, "s", $category);
        }

        mysqli_stmt_execute($statement);

        // Fetching the results
        $selected = mysqli_stmt_get_result($statement);

        // Creating an empty array to store the fetched data
        $data = array();

        // Fetching each row and add it to the data array
        while ($row = mysqli_fetch_assoc($selected)) {
            $data[] = $row;
        }

        // Closing the prepared statement
        mysqli_stmt_close($statement);

        // Returning the data as a JSON response
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        $alert_info[] = 'Invalid category.';
    }

    // Closing the database connection
    mysqli_close($connection);
}
