<?php
$subtitle = "View Listings";
require './view/header.php';
?>

<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
	<style>
		h2,
		h3,
		p,
		small {
			font-family: 'Montserrat', sans-serif;
		}
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #e0e0e0;
            margin: 0;
        }

        .content-box {
            border: 3px solid black;
            border-radius: 8px;
            padding: 20px;
            background-color: white;
            margin: 20px auto;
            max-width: 1200px;
        }

        table.outputTable {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        .outputTable td, .outputTable th {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .outputTable th {
            background-color: #f2f2f2;
        }

        input[type=submit] {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
        }

        input[type=submit]:hover {
            background-color: #333;
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