<?php
    error_reporting(E_WARNING);
    session_start();
    if (!isset($_SESSION['user'])) {
        if (isset($_COOKIE['user'])) {
            $_SESSION['user'] = $_COOKIE['user'];
        } else {
            $_SESSION['user'] = 'Unknown';
        }
    }
    $_SESSION['ActivePage'] = $subtitle;
    require_once './backend/user.php';
    if (is_null($subtitle)) {
        throw new Exception("Subtitle Cannot Be Null");
    }
?>
<!DOCTYPE html>
<html>
<head>
<style>
    body {
        margin:0;
    }
    .left {
        float: left;
    }
    .right {
        float:right;
    }

    .last {
        padding-right: 50px;
    }
    .navbar {
        overflow: hidden;
        background-color: #333;
    }

    .navbar a {
        font-size: 16px;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .dropdown {
        overflow: hidden;
    }

    .dropdown .dropbtn {
        font-size: 16px;  
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }

    .navbar a:hover, .dropdown:hover .dropbtn {
        background-color: red;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        padding-right: 20px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {
    
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>
    <?php
    echo "<title>Real Estate - ".$subtitle."</title> "
    ?> 
</head>
<body>
<?php
//Add the pages you wish to see on the navbar here, in the order you wish them to appear.
//Key is the visible name, value is the actual page it points to (case sensitive, though it doesnt need a .php suffix)
$leftpages = array(
    "Home" => "index",
    "Listings" => "properties",
    "Contact" => "contact"
);
$rightpages = array(
    "Login" => "login",
    "Register" => "register");
if ($_SESSION['user'] != "Unknown" && $_SESSION["user"] != null) {
    $rightpages = [];
    $type =  $_SESSION["AccountType"];
    if ($type == "Admin") {
        $rightpages['Reports'] = 'reports';  
        $rightpages['Administration'] = 'admin';  
    }
    $rightpages[$_SESSION['user']] = "accountmanagement";
}

$rightpages = array_reverse($rightpages);
$stringBuilder = "";
$pages = array_merge($leftpages, $rightpages);
$stringBuilder .= '<div class="navbar">';
foreach ($pages as $key => $page) {
    $side = "left";
    $active = "";
    if (in_array($page, $rightpages)) {
        $side = "right";
    }
    if (mb_strtolower($subtitle) == mb_strtolower($key)) {
        $active = " active";
    }
    if ($page == "accountmanagement") {
        $stringBuilder .= '  
        <div class="dropdown '.$side.' last">
            <button class="dropbtn '.$active.'">'.$key.'
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
            <a href="accountmanagement.php">My Account</a>';
        if ($_SESSION["AccountType"] == "Realtor") {
            $stringBuilder .='<a href="listingmanager.php">My Listings</a>';
        }
        $stringBuilder .='<a href="logoutlanding.php">Log Out</a>
            </div>
        </div>';
    } else if ($page == "admin") {
        $stringBuilder .= '  
        <div class="dropdown '.$side.'">
            <button class="dropbtn '.$active.'">'.$key.'
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
            <a href="admin.php">Manage Users</a>
            <a href="listingmanager.php">Manage Listings</a>
            </div>
        </div>';
    }else {
        $stringBuilder .= '<a class="'.$side.$active.'" href="'.$page.'.php">'.$key.'</a>';
    }
}
$stringBuilder .= "</div>";
echo $stringBuilder;
?>