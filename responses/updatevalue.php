<?php
    session_start();
    require_once '../backend/dbConnect.php';
    require_once '../backend/user.php';
    require_once '../backend/writevalue.php';


    $UID = $_SESSION['UID'];
    $category = $_GET['category'];
    $type = $_GET['type'];
    $value = $_GET['value'];

    echo updateValue($category, $type, $value, $UID);

?>