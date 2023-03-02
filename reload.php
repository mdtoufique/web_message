<?php
     
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['postdata'] = $_POST["pm"];
        unset($_POST["pm"]);
        header("Location:test.php");
        exit;
    }
    else{
        header("Location:test.php");
        exit;
    }
?>