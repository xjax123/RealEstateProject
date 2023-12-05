<?php
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $subtitle = "Add Realtor";
	require './view/header.php';
	require './view/redirect.php';
	require_once './backend/dbConnect.php';

	$defaultImage = "default.png";
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$image = $_FILES['image']['name'];
	if ($image == "default" || !isset($image)) {
		$image = $defaultImage;
	}

    $uploadfile =  __DIR__.'\\images\\'.basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    } else {
        throw new Error("Possible file upload attack!");
    }

	try {
	$conn = connect();
	$result = $conn -> query('SELECT AccountID FROM `accounts` WHERE Username = "'.$user.'" OR Email = "'.$email.'";');
	$conn -> close();
	if ($result -> num_rows > 0) {
		throw new Exception("Duplicate Entry Detetected, Please choose a different username and/or email");
	}
	$conn = connect();
	$result = $conn -> insert('INSERT IGNORE INTO `accounts`(`Username`, `Password`, `AccountType`, `Email`, `PhoneNumber`, `Image`, `Name`) VALUES ("'.$user.'","'.$pass.'","Realtor","'.$email.'","'.$phone.'","'.$image.'","'.$name.'")');
	$conn ->close();
	} catch (Exception $e) {
		redirect('Hrm... Seems Something Went Wrong Here: '.$e ->getMessage().'<br>', './admin.php', 5);
		return;
	}
	
		redirect('Success, User Created', './admin.php', 5);
	
	require './view/footer.php';
?>