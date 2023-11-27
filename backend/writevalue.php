<?php
    require_once 'dbConnect.php';
    require_once 'user.php';
    require_once 'checkUsernamePassword.php';
    function updateValue(string $category, string $type, string $value, int $ID) {
        $conn = connect();
        $query = "";
        if ($category == 'preference') {
            if ($value == NULL) {
                $query = $conn -> query('UPDATE `preference` SET `'.$type.'` = '.$value.' WHERE AccountID = '.$ID.';');
            } else {
                $query = $conn -> query('UPDATE `preference` SET `'.$type.'` = "'.$value.'" WHERE AccountID = '.$ID.';');
            }
        } else if ($category == 'property') {
            if ($value == NULL) {
                $query = $conn -> query('UPDATE `properties` SET `'.$type.'` = '.$value.' WHERE PropertyID = '.$ID.';');
            } else {
                $query = $conn -> query('UPDATE `properties` SET `'.$type.'` = "'.$value.'" WHERE PropertyID = '.$ID.';');
            }
        } else {
            if ($value == NULL) {
                $query = $conn -> query('UPDATE `accounts` SET `'.$type.'` = '.$value.' WHERE AccountID = '.$ID.';');
            } else {
                $query = $conn -> query('UPDATE `accounts` SET `'.$type.'` = "'.$value.'" WHERE AccountID = '.$ID.';');
            }
            updateUserDetails($ID);
        }
        $conn ->close();
        if ($query == 1) {
            return "Completed";
        } else {
            return "Operation Could Not Be Completed";
        }
    }
    function deleteEntry(string $category, int $ID) {
        $conn = connect();
        $query = "";
        if ($category == 'preference') {
            $query = $conn -> query('SELECT * FROM `preference` WHERE AccountID ='.$ID.';');
        } else if ($category == 'property') {
             $query = $conn -> query('DELETE FROM `properties` WHERE PropertyID = '.$ID.';');
        } else {
            $query = $conn -> query('SELECT * FROM `accounts` WHERE AccountID ='.$ID.';');
            $user = "";
            foreach ($query as $q) {
                $user = $q['Username'];
            }
            $at = checkAccount($user);
            if ($at == account_type::Admin){
                throw new Error("You Cannot Delete Other Admin Accounts!");
            } else {
                $query = $conn -> query('DELETE FROM `accounts` WHERE AccountID = '.$ID.';');
            }
        }
        $conn ->close();
        if ($query == 1) {
            return "Completed";
        } else {
            return "Operation Could Not Be Completed";
        }
    }

    function tickLogins($UID) { 
        $conn = connect();
        return $query = $conn -> query('UPDATE `accounts` SET Logins = Logins+1 WHERE AccountID = '.$UID.';');
    }
?>