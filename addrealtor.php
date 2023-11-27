<?php
    $subtitle = "Add Realtor";
	require './view/header.php';
	require './view/redirect.php';
	require_once './backend/dbConnect.php';

	$defaultImage = "https://i.imgur.com/p6qgYpr.jpg";
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$image = $_POST['image'];
	if ($image == "default" or $image == "") {
		$image = $defaultImage;
	}

	$conn = connect();
	$result = $conn ->query('INSERT INTO `accounts`(`Username`, `Password`, `AccountType`, `Email`, `PhoneNumber`, `Image`, `Name`) VALUES ("'.$user.'","'.$pass.'","Realtor","'.$email.'","'.$phone.'","'.$image.'","'.$name.'")');
	$conn ->close();
	
	if ($result == true) {
		redirect('Success, User Created', './admin.php', 5);
	} else {
		redirect('Hrm... Seems Something Went Wrong Here', './admin.php', 5);
	}
	
	require './view/header.php';
?>