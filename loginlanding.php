<?php
    session_start();
    $subtitle = "Landing";
    require_once './backend/modelConstants.php';
    require_once './backend/dbConnect.php';

    $code = response_code::Failed;
    $connection = connect();

    $user = $_GET['user'];
    $pass = $_GET['pass'];

    $result = $connection -> query('SELECT * FROM accounts WHERE Username = "'.$user.'";');
    $connection -> close();

    if ($result -> num_rows > 0) {
        $row = $result -> fetch_assoc();
        $userpass = $row["Password"];
        if ($pass == $userpass) {
            $code = response_code::Success;
            $_SESSION['user'] = $user;
            $_SESSION['UID'] = $row["AccountID"];
            $_SESSION["AccountType"] = $row["AccountType"];
            setcookie("user", $user, (86400 * 30), "/");
        } else {
            $code = response_code::IncorrectPassword;
        }
    } else {
        $code = response_code::UserNotFound;
    }
   
  require_once './view/header.php'; 

  header( "refresh:5;url=index.php" );

  echo 'You\'ll be redirected in about 5 secs. If not, click <a href="index.php">here</a>.';

    require_once './view/footer.php';
?>