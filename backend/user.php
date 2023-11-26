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
?>