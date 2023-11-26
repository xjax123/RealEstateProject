<?php
	require_once 'dbConnect.php';
	
	function isAdminAccount($inputUser) {
		if (!(count_chars($inputUser) >= USERNAME_MIN && count_chars($inputUser) <= USERNAME_MAX)) {
			throw new Error("Username not within accepted bounds");
		}
		$conn = connect();
		$adminQuery = 'SELECT * FROM user WHERE username = "'.$inputUser.'" AND type = "Admin";';
		$results = $conn->query($adminQuery);
		$conn->close();
		if ($results->num_rows == 1) {
			return true;
		}
		return false;
	}

	function isCustomerAccount($inputUser) {
		if (!(count_chars($inputUser) >= USERNAME_MIN && count_chars($inputUser) <= USERNAME_MAX)) {
			throw new Error("Username not within accepted bounds");
		}

		$conn = connect();
		$custQuery = 'SELECT * FROM user WHERE username = "'.$inputUser.'" AND type = "Customer";';
		$results = $conn->query($custQuery);
		$conn->close();
		if ($results->num_rows == 1) {
			return true;
		}
		return false;
	}

	function accountExists($inputUser) {
		$cus = isCustomerAccount($inputUser);
		$admin = isAdminAccount($inputUser);
		return $cus || $admin;
	}
	
	function checkAccount($inputUser) {
		if (!accountExists($inputUser)) {
			throw new Exception("Account Does Not Exist");
		}

		if (isAdminAccount($inputUser)) {
			return account_type::Admin;
		}
		elseif (isCustomerAccount($inputUser)) {
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