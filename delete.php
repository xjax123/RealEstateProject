<?php
    require_once './backend/writevalue.php';
    require_once './backend/dbConnect.php';

    $target = $_GET['target'];
    $ID = $_GET['id'];

    if (isset($_GET['filter'])) {
        if ($_GET['filter'] == "name") {
            $conn = connect();
            $result = $conn ->query('SELECT * FROM `accounts` WHERE Username = "'.$ID.'";');
            foreach ($result as $user) {
                $ID = $user['AccountID'];
            }
        }
    }

    try {
        deleteEntry($target,  $ID);
    } catch (Error $e) {
        echo $e->getMessage();
        return;
    }
    echo "Success"
?>