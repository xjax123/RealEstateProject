<?php
	$subtitle = "My Listings";
	require './view/header.php';
?>
<h3>Generate Report:</h3>

<button onclick="genReport()">Generate!</button>
<select id="selector" name="selector">
	<option value="sales">Sales</option>
    <option value="property">Property Popularity</option>
    <option value="user">User Activity</option>
</select> 
<span id="hidden" style="visibility:visible;">
Year: <input type="text" id="year" value="2023"> 
Month:
<select id="month" name="month">
	<option value="00">No Month</option>
	<option value="01">January</option>
	<option value="02">Febuary</option>
	<option value="03">March</option>
	<option value="04">April</option>
	<option value="05">May</option>
	<option value="06">June</option>
	<option value="07">July</option>
	<option value="08">August</option>
	<option value="09">September</option>
	<option value="10">October</option>
	<option value="11">November</option>
	<option value="12">January</option>
</select> 
</span>
<div id="output"></div>
<script>
	var selector = document.getElementById("selector");
	var hidden = document.getElementById("hidden");
	var year = document.getElementById("year"); 
	var month = document.getElementById("month");

	function hide() {
		if (selector.value == "user") {
			hidden.style.visibility = 'hidden';
			hidden.style.width = '0px';
		} else {
			hidden.style.visibility = 'visible';
		}
		setTimeout(hide, 10);
	}
	hide();

	function genReport() {
		var s = selector.value;
		var m = month.value;
		var y = year.value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
            output.innerHTML = this.responseText;
		};
		
		xhttp.open("GET", 'reportgeneration.php?selector='+s+'&month='+m+'&year='+y, true);
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