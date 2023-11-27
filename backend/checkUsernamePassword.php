<?php
	require_once 'dbConnect.php';
	
	function isAdminAccount($inputUser) {
		$conn = connect();
		$adminQuery = 'SELECT * FROM accounts WHERE Username = "'.$inputUser.'" AND AccountType = "Admin";';
		$results = $conn->query($adminQuery);
		$conn->close();
		if ($results->num_rows == 1) {
			return true;
		}
		return false;
	}
	function isRealtorAccount($inputUser) {
		$conn = connect();
		$custQuery = 'SELECT * FROM accounts WHERE Username = "'.$inputUser.'" AND AccountType = "Realtor";';
		$results = $conn->query($custQuery);
		$conn->close();
		if ($results->num_rows == 1) {
			return true;
		}
		return false;
	}
	function isCustomerAccount($inputUser) {
		$conn = connect();
		$custQuery = 'SELECT * FROM accounts WHERE Username = "'.$inputUser.'" AND AccountType = "Customer";';
		$results = $conn->query($custQuery);
		$conn->close();
		if ($results->num_rows == 1) {
			return true;
		}
		return false;
	}

	function accountExists($inputUser) {
		$cus = isCustomerAccount($inputUser);
		$real = isRealtorAccount($inputUser);
		$admin = isAdminAccount($inputUser);
		return $cus || $admin || $real;
	}
	
	function checkAccount($inputUser) {
		if (!accountExists($inputUser)) {
			throw new Exception("Account Does Not Exist");
		}
		if (isAdminAccount($inputUser)) {
			return account_type::Admin;
		} else if (isRealtorAccount($inputUser)) {
			return account_type::Realtor;
		} else if (isCustomerAccount($inputUser)) {
			return account_type::Customer;
		}
	}

	function getHash($user) {
		$conn = connect();
		$input = 'SELECT password FROM user WHERE username = "'.$user.'";';
		$result = $conn->query($input);
		$conn ->close();
		$field = $result -> fetch_object();
		return $field -> salt();
	}

	function verifyPassword($username, $password) {
		$account = checkAccount($username);
		$hash = getHash($username);
		return password_verify($password, $hash);
	}

?>