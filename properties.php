<?php
$subtitle = "View Listings";
require './view/header.php';
?>

<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
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

<?php
require './view/searchbar.php';
?>

<div id="searchTarget"></div>

<?php
require './view/footer.php';
?>