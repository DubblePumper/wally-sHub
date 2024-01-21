<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the "Ja" button (with value "true") was clicked
    if (isset($_POST["verifyButton"]) && $_POST["verifyButton"] == "true") {
        
        $_SESSION['age'] = true;
        $_SESSION['firstLoaded'] = false;
        header("Location: ../../index.php");
        exit();
    } else if (isset($_POST["verifyButton"]) && $_POST["verifyButton"] == "false") {
        $_SESSION['age'] = false;
        header("Location: ../../underAge.php");
        exit();
    } else {
        // If the "Nee" button was clicked, or if the user didn't click either button, redirect to the homepage
        header("Location: ../../index.php");
        exit();
    }
}
?>