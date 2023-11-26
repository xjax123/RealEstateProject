<?php
    require_once 'dbConnect';
    require_once 'checkUsernamePassword.php';
    require_once 'user.php';

    function createAdmin($username, $password) {
        if (accountExists($username)) {
            throw new Error("Account Already Exists");
        }
    }

    function createCustomer($username, $password) {
        if (accountExists($username)) {
            throw new Error("Account Already Exists");
        }
    }
    
?>