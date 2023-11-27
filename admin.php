<?php
	$subtitle = "My Listings";
	require './view/header.php';
?>
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
			<td><input type="text" id="image" name="image"></td>
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

<script>
	function validate() {

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