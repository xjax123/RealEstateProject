<?php
$subtitle = "Register";
require_once './view/header.php';
require_once './backend/checkUsernamePassword.php';
require_once './view/redirect.php';
$user = $_POST['user'];
$pass = $_POST['pass'];
$email = $_POST['email'];
$pnumber = $_POST['pnumber'];
$name = $_POST['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Real Estate - <?php echo $subtitle; ?></title>
	<style>
		body {
			font-family: 'Montserrat', sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f8f8f8;
		}

		.registration-container {
			max-width: 600px;
			margin: 50px auto;
			padding: 20px;
			background-color: #fff;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		.form-group {
			margin-bottom: 20px;
		}

		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
		}

		input,
		select {
			width: 100%;
			padding: 10px;
			box-sizing: border-box;
			margin-bottom: 10px;
			border: 1px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
		}

		input[type="submit"] {
			background-color: #3498db;
			color: white;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #2980b9;
		}

		#output {
			color: red;
			font-weight: bold;
		}
	</style>
</head>

<body>

	<div class="registration-container">
		<h3>Alright! How about you tell us about your preferred property?</h3>
		<form method="POST" action="registerlanding.php" onsubmit="return validateForm()">
			<input type="hidden" id="user" name="user" value="<?php echo $user; ?>">
			<input type="hidden" id="email" name="email" value="<?php echo $email; ?>">
			<input type="hidden" id="pnumber" name="pnumber" value="<?php echo $pnumber; ?>">
			<input type="hidden" id="pass" name="pass" value="<?php echo $pass; ?>">
			<input type="hidden" id="name" name="name" value="<?php echo $name; ?>">

			<div class="form-group">
				<label for="city">Preferred City:</label>
				<input type="text" id="city" name="city">
			</div>

			<div class="form-group">
				<label for="province">Preferred Province:</label>
				<input type="text" id="province" name="province">
			</div>

			<div class="form-group">
				<label for="size-range">Size Range (sqft):</label><br>
				<input type="text" id="sizemin" name="sizemin" placeholder="Min">
				<input type="text" id="sizemax" name="sizemax" placeholder="Max">
			</div>

			<div class="form-group">
				<label for="price-range">Price Range ($):</label><br>
				<input type="text" id="pricemin" name="pricemin" placeholder="Min">
				<input type="text" id="pricemax" name="pricemax" placeholder="Max">
			</div>

			<div class="form-group">
				<label for="type">Preferred Type:</label>
				<select id="type" name="type">
					<option value="Condo">Condo</option>
					<option value="Commercial">Commercial</option>
					<option value="Townhouse">Townhouse</option>
					<option value="House">House</option>
					<option value="Apartment">Apartment</option>
				</select>
			</div>

			<div class="form-group">
				<input type="submit" name="submit" id="submit" value="Submit">
			</div>
		</form>

		<div id="output"></div>
	</div>

	<script>
		function validateForm() {
			var city = document.getElementById("city").value;
			var province = document.getElementById("province").value;
			var sizemin = document.getElementById("sizemin").value;
			var sizemax = document.getElementById("sizemax").value;
			var pricemin = document.getElementById("pricemin").value;
			var pricemax = document.getElementById("pricemax").value;
			var output = document.getElementById("output");

			if (city.length == 0 || province.length == 0 || sizemin.length == 0 || sizemax.length == 0 || pricemin.length == 0 || pricemax.length == 0) {
				output.innerHTML = "Cannot Have Blank Entries";
				return false;
			}
			return true;
		}
	</script>

</body>

</html>

<?php
require './view/footer.php';
?>