<?php
$subtitle = "Home";
require './view/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<style>
		body {
			font-family: 'Montserrat', sans-serif;
			background-color: #e0e0e0;
			margin: 0;
		}

		h2,
		h3,
		p,
		small {
			font-family: 'Montserrat', sans-serif;
		}
	</style>
</head>

<body>
	<section style="padding: 20px; max-width: 1200px; margin: 0 auto; text-align: center;">
		<img src="images/logo.png" alt="Logo" style="width: 250px; margin-bottom: 20px; display: block; margin-left: auto; margin-right: auto;">
		<div style="border: 3px solid black; border-radius: 8px; padding: 20px; background-color: white; margin-bottom: 20px;">
			<p>Discover your dream home. Whether you're looking for a cozy apartment, a spacious home, or a luxurious villa, we have your perfect property.</p>
		</div>

		<div style="display: flex; flex-wrap: wrap; justify-content: space-around;">
			<div style="flex: 0 1 30%; margin-bottom: 20px; border: 3px solid black; border-radius: 8px; padding: 10px; background-color: white; text-align: center;">
				<a href="properties.php">
					<img src="images/house1.jpg" alt="House 1" style="width: 100%; border-radius: 8px; margin-bottom: 0;">
				</a>
				<small style="color: #777;">Sample image, actual property not for sale.</small>
				<h3 style="margin-top: 10px;">Modern Apartments</h3>
				<p>Explore our collection of modern apartments with stunning city views and top-notch amenities.</p>
			</div>

			<div style="flex: 0 1 30%; margin-bottom: 20px; border: 3px solid black; border-radius: 8px; padding: 10px; background-color: white; text-align: center;">
				<a href="properties.php">
					<img src="images/house2.jpg" alt="House 2" style="width: 100%; border-radius: 8px; margin-bottom: 0;">
				</a>
				<small style="color: #777;">Sample image, actual property not for sale.</small>
				<h3 style="margin-top: 10px;">Spacious Houses</h3>
				<p>Find the perfect house with ample space for your family and a beautiful backyard for relaxation.</p>
			</div>

			<div style="flex: 0 1 30%; margin-bottom: 20px; border: 3px solid black; border-radius: 8px; padding: 10px; background-color: white; text-align: center;">
				<a href="properties.php">
					<img src="images/house3.jpg" alt="House 3" style="width: 100%; border-radius: 8px; margin-bottom: 0;">
				</a>
				<small style="color: #777;">Sample image, actual property not for sale.</small>
				<h3 style="margin-top: 10px;">Luxurious Villas</h3>
				<p>Indulge in luxury living with our exclusive collection of villas featuring exquisite designs and premium amenities.</p>
			</div>
		</div>

		<div style="border: 3px solid black; border-radius: 8px; padding: 20px; background-color: white; text-align: center; margin-top: 1px;">
			<h2>About Us</h2>
			<p>We at The Real Estate Company, are dedicated to support your endeavours in anything real estate related.</p>
			<p>We provide an easy to navigate website where you can buy, sell, and search for your dream home.</p>
		</div>
	</section>
</body>

<?php
require './view/footer.php';
?>