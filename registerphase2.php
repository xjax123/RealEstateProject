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
    echo '
		<h3>Alright! how about you tell us about your prefered property?</h3>
		<form method="POST" action="registerlanding.php" onsubmit="return validateForm()">
		<input type="hidden" id="user" name="user" value ="'.$user.'">
		<input type="hidden" id="email" name="email" value ="'.$email.'">
		<input type="hidden" id="pnumber" name="pnumber" value ="'.$pnumber.'">
		<input type="hidden" id="pass" name="pass" value ="'.$pass.'">
		<input type="hidden" id="name" name="name" value ="'.$name.'">
		<label for="type">Prefered City:</label>
		<input type="text" id="city" name="city"><br>
		<label for="type">Prefered Province:</label>
		<input type="text" id="province" name="province"><br>
		<label for="sizemin">Size Range:</label><br>
		<input type="text" id="sizemin" name="sizemin">sqft - <input type="text" id="sizemax" name="sizemax">sqft<br>
		<label for="pricemin">Price Range:</label><br>
		<input type="text" id="pricemin" name="pricemin"> - <input type="text" id="pricemax" name="pricemax"><br>
		<label for="type">Prefered Type:</label>
		<select id="type" name="type">
					<option value="Condo">Condo</option>
					<option value="Commercial">Commercial</option>
					<option value="Townhouse">Townhouse</option>
					<option value="House">House</option>
					<option value="Apartment">Apartment</option>
		</select><br>
		<input type="submit" name="submit" id="submit" value="Submit">
    ';
	require './view/footer.php';
?> 