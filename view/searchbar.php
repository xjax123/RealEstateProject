<style>
	#search-bar {
		display: left;
		justify-content: flex-end;
		align-items: center;
		height: 70px;
		background-color: #f8f8f8;
		border-bottom: 1px solid #ddd;
		padding: 20px;
		padding-bottom: 0px;
	}

	#search {
		padding: 10px;
		border: 1px solid #ccc;
		border-radius: 4px;
		margin-right: 10px;
		font-size: 14px;
	}

	#filter {
		padding: 10px;
		border: 1px solid #ccc;
		border-radius: 4px;
		margin-right: 10px;
		font-size: 14px;
	}

	#search-button {
		padding: 12px;
		background-color: #3498db;
		/* Change this color */
		color: white;
		border: none;
		border-radius: 4px;
		cursor: pointer;
		font-size: 14px;
	}

	#search-button:hover {
		background-color: #2980b9;
	}
</style>

<div id="search-bar">
	<input type="text" name="searchFor" id="search" placeholder="Search...">
	<select id="filter" name="filter">
		<option value="type">Type</option>
		<option value="price">Price</option>
		<option value="location">Location</option>
		<option value="year">Year</option>
		<option value="id">ID</option>
	</select>
	<button id="search-button" onclick="request()">Search</button>
</div>

<script>
	function request() {
		var xhttp = new XMLHttpRequest();
		var target = document.getElementById("searchTarget");
		var text = document.getElementById("search").value;
		if (text.length === 0) {
			return;
		}
		var filter = document.getElementById("filter").value;
		xhttp.onreadystatechange = function() {
			if (this.readyState === 4 && this.status === 200) {
				target.innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", 'search.php?search=' + text + '&filter=' + filter, true);
		xhttp.send();
	}
</script>