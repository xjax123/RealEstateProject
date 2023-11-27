<?php
    class User {
		public int $userID;
		public string $name;
		public string $username;
		public string $passwordHash;
		public string $accountType;
		
		public function __construct($id, $user, $fullName, $pass, $type) {
			$this->userID = $id;
			$this->name = $fullName;
			$this->username = $user;
			$this->passwordHash = $pass;
			$this->accountType = $type;
		}

		public function __toString() {
			return $this -> username;
		}
	}

	function updateUserDetails($UID) {
		$connection = connect();
		$result = $connection -> query('SELECT * FROM accounts WHERE AccountID = "'.$UID.'";');
		if ($result -> num_rows > 0) {
			$row = $result -> fetch_assoc();
			$code = response_code::Success;
			$_SESSION['user'] = $row['Username'];
			$_SESSION['UID'] = $row["AccountID"];
			$_SESSION["AccountType"] = $row["AccountType"];
			$_SESSION["Name"] = $row["Name"];
			$_SESSION["Email"] = $row["Email"];
			setcookie("user", $row['Username'], (86400 * 30), "/");
		} else {
			$code = response_code::UserNotFound;
		}
		return $code;
	}
?>