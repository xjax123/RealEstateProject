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
            text-align: center;
        }

        select, input[type="text"], button {
            font-family: 'Montserrat', sans-serif;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
        }

        button {
            background-color: black;
            color: white;
            cursor: pointer;
            border: none;
        }

        button:hover {
            background-color: #333;
        }

        #output {
            margin-top: 20px;
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
</style>
<?php
	require './view/footer.php';
?>