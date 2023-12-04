<?php
$subtitle = "Register";
require './view/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
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
			/* Blue color */
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
	<h2>Register:</h2>
	<form method="POST" action="registerphase2.php" onsubmit="return validateForm()">
		<label for="user">Username:</label>
		<input type="text" id="user" name='user' required>
		<br>
		<label for="name">Full Name:</label>
		<input type="text" id="name" name='name' required>
		<br>
		<label for="email">Email:</label>
		<input type="email" id="email" name='email' required>
		<br>
		<label for="pnumber">Phone Number:</label>
		<input type="tel" id="pnumber" name='pnumber' placeholder="xxx-xxx-xxxx" required>
		<br>
		<label for="pass">Password:</label>
		<input type="password" id="pass" name='pass' required>
		<br>
		<label for="conpass">Confirm Password:</label>
		<input type="password" id="conpass" name='conpass' required>
		<br>
		<input type="submit" name="submit" id="submit" value="Submit">
	</form>
	<span id="final"></span>

	<script>
		function validateForm() {
			var user = document.getElementById("user").value;
			var pass = document.getElementById("pass").value;
			var conpass = document.getElementById("conpass").value;
			var email = document.getElementById("email").value;
			var pnumber = document.getElementById("pnumber").value;
			var output = document.getElementById("final");

			if (pass != conpass) {
				output.innerHTML = "Passwords Must Match";
				return false;
			}
			if (user.length == 0 || pass.length == 0 || email.length == 0 || pnumber.length == 0) {
				output.innerHTML = "Cannot Have Blank Entries";
				return false;
			}
			if (user.length < 6) {
				output.innerHTML = "Username Too Short";
				return false;
			}
			if (pass.length < 6) {
				output.innerHTML = "Password Too Short";
				return false;
			}
			return true;
		}
	</script>
</body>

<?php
require './view/footer.php';
?>