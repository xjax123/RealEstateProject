<?php
	$subtitle = "Login";
	require './view/header.php';
?>

<body>
	<H2>Login:</H2>
	<form method="GET" action="loginlanding.php" onsubmit="return validateForm()">
	<label for="user">Username:</label>
	<input type="text" id="user" name='user'><br>
	<label for="pass">Password:</label>
	<input type="text" id="pass" name='pass'><br>
		<input type="submit" name="submit" id="submit" value="Submit">
	<br>
	</form>
	<span id="final"></span>
</body>
<script>
	function validateForm() {
		var user = document.getElementById("user").value;
		var pass = document.getElementById("pass").value;
		var response = document.getElementById("final");
		if (user.length != 0 && pass.length != 0) {
			return true;
		} else if (user.length == 0 && pass.length == 0) {
			response.innerHTML = "Please Input a Username And Password"
		} else if (user.length == 0) {
			response.innerHTML = "Please Input a Username"
		} else if (pass.length == 0) {
			response.innerHTML = "Please Input a Password"
		}
		return false;
	}
</script>
<?php
	require './view/footer.php';
?>