<?php
	$subtitle = "Register";
	require './view/header.php';
?>

<body>
	<H2>Register:</H2>
	<form method="POST" action="registerphase2.php" onsubmit="return validateForm()">
	<label for="user">Username:</label>
	<input type="text" id="user" name='user'><br>
	<label for="name">Full Name:</label>
	<input type="text" id="name" name='name'><br>
	<label for="email">Email:</label>
	<input type="text" id="email" name='email'><br>
	<label for="pnumber">Phone Number:</label>
	<input type="text" id="pnumber" name='pnumber' placeholder="xxx-xxx-xxxx"><br>
	<label for="pass">Password:</label>
	<input type="text" id="pass" name='pass'><br>
	<label for="conpass">Confirm Password:</label>
	<input type="text" id="conpass" name='conpass'><br>
	<input type="submit" name="submit" id="submit" value="Submit">
	</form>
	<span id="final"></span>
</body>

<script>
	function validateForm() {
		var user = document.getElementById("user").value;
		var pass = document.getElementById("pass").value;
		var conpass = document.getElementById("conpass").value;
		var email = document.getElementById("email").value;
		var pnumber = document.getElementById("pnumber").value;
		var output =document.getElementById("final");

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

<?php
	require './view/footer.php';
?>