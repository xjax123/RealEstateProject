<?php
    require_once 'user.php';
    function updateValue($category, $type, $value, $UID) {
        $conn = connect();
        $query = "";
        if ($category == 'preference') {
            $query = $conn -> query('UPDATE `preference` SET `'.$type.'` = "'.$value.'" WHERE AccountID = '.$UID.';');
        } else if ($category == 'property') {
            $query = $conn -> query('UPDATE `properties` SET `'.$type.'` = "'.$value.'" WHERE PropertyID = '.$UID.';');
        } else {
            $query = $conn -> query('UPDATE `accounts` SET `'.$type.'` = "'.$value.'" WHERE AccountID = '.$UID.';');
        }
        if ($query == true) {
            updateUserDetails($UID);
            return "Completed";
        } else {
            return "Operation Could Not Be Completed";
        }
    }

    function tickLogins($UID) { 
        $conn = connect();
        return $query = $conn -> query('UPDATE `preference` SET Logins = Logins+1 WHERE AccountID = '.$UID.';');
    }
?>