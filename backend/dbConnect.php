<?php
	require_once 'modelConstants.php';
	class Connection {
		private $conn; //live connection
		function __construct() {
			$this -> conn = mysqli_connect(SQL_SERVERNAME, SQL_USERNAME, SQL_PASSWORD, SQL_DATABASE);
		}
		public function close() {
			$this-> conn -> close();
		}
		public function live() {
			if ($this -> conn) {
				return true;
			}
			return false;
		}
		public function error() {
			return mysqli_error($this -> conn);
		}

		public function query($sql) {
			return $this -> conn -> query($sql);
		}

		private function insert($data) {
			$result = $this -> query($data);
			if ( $result === TRUE) {
				return "New record created successfully";
			  } else {
				throw new Error("Error: " . $data . "<br>" . $this->conn->error);
			} 
		}

		public function partialInsert($table, array $columns, array $data) {

		}

		public function fullInsert($table, array $data) {

		}
	}
	function connect() {
		// Create connection
		$conn = new Connection();

		// Check connection
		if (!$conn -> live()) {
			throw new Error("Connection failed: " . mysqli_connect_error());
		}

		return $conn;
	}
	
	
?>