<?php
	require_once './backend/dbConnect.php';
	require_once 'user.php';
	function getUserbyUsername($name) {
		$conn = connect();
		$results = $conn->query('SELECT * FROM accounts WHERE Username = "'.$name.'";');
		$conn->close();
		foreach($results as $r) {
			return new User($r['AccountID'],$r['Name'],$r['Username'],$r['Password'],$r['AccountType']);
		}
	}
	function getUserbyID($ID) {
		$conn = connect();
		$results = $conn->query('SELECT * FROM accounts WHERE AccountID = "'.$ID.'";');
		$conn->close();
		foreach($results as $r) {
			return new User($r['AccountID'],$r['Name'],$r['Username'],$r['Password'],$r['AccountType']);
		}
	}
?>