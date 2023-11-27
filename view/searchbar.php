<main>
	<div style="text-align:right;height:25px;border-style:hidden hidden dotted hidden;">
		Search for: <input type="text" name="searchFor" id="search">
			<select id="filter" name="filter">
				<option value="type">Type</option>
				<option value="price">Price</option>
				<option value="location">Location</option>
				<option value="year">Year</option><br>
				<option value="id">ID</option><br>
			<input type="submit" onclick="request()">
	</div>
</main>
<script>
	function request() {
		var xhttp = new XMLHttpRequest();
		var target = document.getElementById("searchTarget");
		var text = document.getElementById("search").value;
		if (text.length == 0) {
			return;
		}
		var filter = document.getElementById("filter").value;
		xhttp.onreadystatechange = function() {
			target.innerHTML = this.responseText;
		};
		xhttp.open("GET", 'search.php?search="'+text+'&filter='+filter, true);
		xhttp.send();
	}
</script>