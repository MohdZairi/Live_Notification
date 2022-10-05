<?php
// Start the session
session_start();

// if the user is already logged in then redirect user to welcome page
if (isset($_SESSION["Login"]) && $_SESSION["Login"] === true) {
    header("location: index.php");
    exit;
}
?>