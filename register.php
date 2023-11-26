<?php
	$subtitle = "Register";
	require './view/header.php';
?>

<body>
	<H2>Register:</H2>
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
		
	}
</script>

<?php
	require './view/footer.php';
?>