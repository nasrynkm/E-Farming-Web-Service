<?php
session_start();

if (isset($_SESSION['uniqueID'])) {
    // WHEN SESSION IS SET
    @include "./config.php";

    $logOutID = mysqli_real_escape_string($connection, $_GET['logout_id']);

    if (isset($logOutID)) {

        // ENDING USER'S SESSION AND DIRECTING BACK TO LOG IN
        session_unset();
        session_destroy();
        header("location: ./login.php");
    } else {

        //IF NO USER LOGOUT ID INITIATED THEN WE HERE
        //CHEICKING IF USER IS A FARMER OR CUSTOMER THEN DIRECTING BACK TO DASHBOARD
        $userQ = "SELECT account FROM users WHERE uniqueID = {$_SESSION['uniqueID']}";
        $userQuering = mysqli_query($connection, $userQ);

        if (mysqli_num_rows($userQuering) > 0) {

            $account = mysqli_fetch_assoc($userQuering);

            if ($account['account'] == "Farmer" || $account['account'] == "farmer") {
                header("location: ./Farmer/farmerdash.php");
            } else {
                header("location: ./CustomerDash.php");
            }
        } else {
            header("location: ./login.php");
        }
    }
} else {
    // WHEN NO SESSION AND ONES TO ACCESS THIS PAGE IS DIRECTED TO...
    header("location: ./login.php");
}
