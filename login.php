<?php
$subtitle = "Login";
require './view/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<style>
		body {
			font-family: 'Montserrat', sans-serif;
			background-color: #f4f4f4;
			text-align: center;
			margin-top: 0;
		}

		h2 {
			color: #333;
		}

		form {
			max-width: 300px;
			margin: 0 auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		label {
			display: block;
			margin-bottom: 8px;
			color: #555;
		}

		input {
			width: 100%;
			padding: 10px;
			margin-bottom: 15px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type="submit"] {
			background-color: #3498db;
			color: white;
			cursor: pointer;
			border: none;
			padding: 10px 15px;
			border-radius: 4px;
		}

		input[type="submit"]:hover {
			background-color: #2980b9;
		}

		span {
			color: red;
			font-style: italic;
		}
	</style>
</head>

<body>
	<img src="images/logo.png" alt="Logo" style="width: 250px; margin-bottom: 20px; display: block; margin-left: auto; margin-right: auto;">
	<h2>Login:</h2>
	<form method="GET" action="loginlanding.php" onsubmit="return validateForm()">
		<label for="user">Username:</label>
		<input type="text" id="user" name='user' required>
		<br>
		<label for="pass">Password:</label>
		<input type="password" id="pass" name='pass' required>
		<br>
		<input type="submit" name="submit" id="submit" value="Submit">
		<br>
	</form>
	<span id="final"></span>

	<script>
		function validateForm() {
			var user = document.getElementById("user").value;
			var pass = document.getElementById("pass").value;
			var response = document.getElementById("final");
			if (user.length != 0 && pass.length != 0) {
				return true;
			} else if (user.length == 0 && pass.length == 0) {
				response.innerHTML = "Please input a Username and Password";
			} else if (user.length == 0) {
				response.innerHTML = "Please input a Username";
			} else if (pass.length == 0) {
				response.innerHTML = "Please input a Password";
			}
			return false;
		}
	</script>
</body>

<?php
require './view/footer.php';
?>