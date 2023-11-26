<?php
    session_start();
    $subtitle = "Logout";

    $_SESSION['user'] = "Unknown";
    $_SESSION['UID'] = "";
    $_SESSION["AccountType"] = "";

    
    require_once './view/header.php';

    header( "refresh:5;url=./index.php" );

    echo '<h3>Logged Out! You\'ll be redirected in about 5 secs. If not, click <a href="index.php">here</a>.</h3>';
    
    require_once './view/footer.php';
?>