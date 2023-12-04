<?php
session_start();
$subtitle = "Landing";
require_once './backend/modelConstants.php';
require_once './backend/dbConnect.php';
require_once './backend/writevalue.php';
?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">

<style>
    body {
        font-family: 'Montserrat', sans-serif;
        margin: 0;
        padding: 0;
    }
</style>

<?php
$connection = connect();

$user = $_GET['user'];
$pass = $_GET['pass'];

$result = $connection->query('SELECT * FROM accounts WHERE Username = "' . $user . '";');
$connection->close();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userpass = $row["Password"];
    if ($pass == $userpass) {
        updateValue("account", "LastLogin", date("Y-m-d H:i:s"), $row["AccountID"]);
        tickLogins($row["AccountID"]);
        $_SESSION['user'] = $user;
        $_SESSION['UID'] = $row["AccountID"];
        $_SESSION["AccountType"] = $row["AccountType"];
        $_SESSION["Name"] = $row["Name"];
        $_SESSION["Email"] = $row["Email"];
        $_SESSION["LastLogin"] = date("Y-m-d H:i:s");
        setcookie("user", $user, (86400 * 30), "/");
    }
}

require_once './view/header.php';

header("refresh:5;url=index.php");

echo 'You\'ll be redirected in about 5 secs. If not, click <a href="index.php">here</a>.';

require_once './view/footer.php';
?>