<?php
$subtitle = 'Registration';
require_once './backend/dbConnect.php';
require_once './view/redirect.php';
require_once './view/header.php';
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
$user = $_POST['user'];
$pass = $_POST['pass'];
$email = $_POST['email'];
$pnumber = $_POST['pnumber'];
$name = $_POST['name'];

$city = $_POST['city'];
$province = $_POST['province'];
$sizemin = $_POST['sizemin'];
$sizemax = $_POST['sizemax'];
$pricemin = $_POST['pricemin'];
$pricemax = $_POST['pricemax'];
$type = $_POST['type'];

$conn = connect();
$result = $conn->insert('INSERT INTO `accounts`(`Username`, `Password`, `AccountType`, `Email`, `PhoneNumber`, `Name`) VALUES ("' . $user . '", "' . $pass . '", "Customer", "' . $email . '", "' . $pnumber . '", "' . $name . '");');

if ($result == true) {
    $pref;
    $acct = $conn->query('SELECT * FROM `accounts` WHERE Username = "' . $user . '";');

    foreach ($acct as $row) {
        $pref = $conn->insert('INSERT INTO `preference`(`AccountID`, `City`, `Province`, `Type`, `SizeMin`, `SizeMax`, `PriceMin`, `PriceMax`) VALUES (' . $row['AccountID'] . ',"' . $city . '","' . $province . '","' . $type . '","' . $sizemin . '","' . $sizemax . '","' . $pricemin . '","' . $pricemax . '");');
    }

    if ($pref != true) {
        redirect("Something Went Wrong with your entry! please try again", "register.php", 5);
    } else {
        redirect("You're All Set! Please log in", "login.php", 5);
    }
} else {
    redirect("Something Went Wrong with your entry! Please try again", "register.php", 5);
}

require_once './view/footer.php';
?>