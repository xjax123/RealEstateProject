<?php
	$subtitle = "Manage Realtors";
	require './view/header.php';
?>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Realtors</title>
<style>
	body {
		font-family: 'Montserrat', sans-serif;
		background-color: #e0e0e0;
		margin: 0;
	}

	h3 {
		text-align: center;
		font-family: 'Montserrat', sans-serif;
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

	input[type="text"], input[type="file"], input[type="submit"] {
		padding: 8px;
		border-radius: 4px;
		margin-bottom: 10px;
		font-family: 'Montserrat', sans-serif;
	}

	input[type="submit"] {
		background-color: black;
		color: white;
		cursor: pointer;
	}

	input[type="submit"]:hover {
		background-color: #333;
	}

	button {
		background-color: black;
		color: white;
		padding: 10px 20px;
		border: none;
		border-radius: 8px;
		cursor: pointer;
		font-family: 'Montserrat', sans-serif;
	}

	button:hover {
		background-color: #333;
	}

	.form-container {
		display: flex;
		flex-direction: column;
		align-items: center;
		padding: 15px;
	}

	table.outputTable {
		width: 100%;
		table-layout: fixed;
	}

	.outputTable input[type="text"], .outputTable input[type="file"] {
		width: 90%; /* Adjusts the width of input fields */
		box-sizing: border-box; /* Includes padding and border in the element's total width and height */
	}

	.outputTable td {
		padding: 10px;
		word-wrap: break-word; /* Ensures text wraps to avoid overflow */
	}

	@media screen and (max-width: 768px) {
		.outputTable, .outputTable th, .outputTable td {
			display: block;
			width: 100%;
		}

		.outputTable th {
			text-align: left;
		}

		.outputTable td {
			border: none;
			border-bottom: 1px solid #ddd;
			position: relative;
			padding-left: 50%;
		}

		.outputTable td:before {
			content: attr(data-label);
			position: absolute;
			left: 10px;
			top: 10px;
			font-weight: bold;
		}
	}
</style>
</head>
<div class="content-box">
	<h3>Add New Realtor</h3>
	<table class="outputTable">
		<thead>
			<th>Username</th>
			<th>Password</th>
			<th>Email</th>
			<th>Phone Number</th>
			<th>Image (Link, Optional)</th>
			<th>Name</th>
			<th>Submit</th>
		</thead>
		<tbody>
			<form method="POST" action="addrealtor.php" onsubmit="return validate()">
				<td><input type="text" id="username" name="username"></td>
				<td><input type="text" id="password" name="password"></td>
				<td><input type="text" id="email" name="email"></td>
				<td><input type="text" id="phone" name="phone"></td>
				<td><input type="file" id="image" name="image"></td>
				<td><input type="text" id="name" name="name"></td>
				<td><input type="submit" id="submit" name="submit" value="Submit!"></td>
			</form>
		</tbody>
	</table>
	<h3>Delete User</h3>
	<input type="text" id="deltarget" name="deltarget">
	<select id="delfilter" id="delfilter" name="delfilter">
					<option value="name">Username</option>
					<option value="ID">ID</option>
	</select><br>
	<button id="delbutton" onclick="delFind()">Delete User</button>
	<div id="deloutput"></div>
</div>

<script>
	var button =document.getElementById("submit");
	function hide() {
		if (validate()) {
			button.disabled = false;
			button.style.backgroundColor = "#008000"
		} else {
			button.disabled = false;
			button.style.backgroundColor = "#FF0000"
		}
		setTimeout(hide, 10);
	}

	function validate() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;
		var email = document.getElementById("email").value;
		var phone = document.getElementById("phone").value;
		var name = document.getElementById("name").value;

		if (username == "" || password == "" || email == "" || phone == "" || name == "") {
			return false;
		}
		if (username.length < 6 || password.length < 6) {
			return false
		}
		return true;
	}

	function delFind() {
		var filter = document.getElementById("delfilter").value;
		var id = document.getElementById("deltarget").value;
		var out = document.getElementById("deloutput");
        var target = "account";
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
            out.innerHTML = this.responseText;
		};
		
		xhttp.open("GET", 'delete.php?target='+target+'&id='+id+'&filter='+filter, true);
		xhttp.send();
	}
	
	hide();
</script>

<style type="text/css">
	.outputTable  {
		border-collapse:collapse;
		border-spacing:0;
	}
	.outputTable td {
		border-color:black;
		border-style:solid;
		border-width:1px;
		font-family:Arial, sans-serif;
		font-size:14px;
		overflow:hidden;
		padding:10px 5px;
		word-break:normal;
	}
	.outputTable th {
		border-color:black;
		border-style:solid;
		border-width:1px;
		font-family:Arial, sans-serif;
		font-size:14px;
		font-weight:normal;
		overflow:hidden;
		padding:10px 5px;
		word-break:normal;
	}
</style>

<?php
	require './view/footer.php';
?>