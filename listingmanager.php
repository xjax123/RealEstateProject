<?php
$subtitle = "My Listings";
require './view/header.php';
require_once './model/propertySearch.php';
?>

<style type="text/css">
	body {
		font-family: 'Montserrat', sans-serif;
	}

	.outputTable {
		border-collapse: collapse;
		border-spacing: 0;
		width: 100%;
	}

	.outputTable td,
	.outputTable th {
		border: 1px solid #ddd;
		padding: 8px;
		text-align: left;
	}

	.outputTable th {
		background-color: #f2f2f2;
	}

	.btn-add-listing,
	.btn-edit {
		font-family: 'Montserrat', sans-serif;
		background-color: #3498db;
		color: white;
		border: none;
		padding: 8px 12px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 14px;
		cursor: pointer;
		border-radius: 4px;
	}

	.btn-add-listing:hover,
	.btn-edit:hover {
		background-color: #2980b9;
	}

	.property-table-container {
		overflow-x: auto;
		margin-top: 20px;
	}
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

<?php
if ($_SESSION["AccountType"] == "Admin") {
	require './view/searchbar.php';
	echo '<div id="searchTarget"></div>';
} else if ($_SESSION["AccountType"] == "Realtor") {
	echo '<h3>Current Properties</h3> <form action="newlisting.php"><input type="submit" class="btn-add-listing" value="Add New Listing"></form>';
	$properties = getPropertyByRealtor($_SESSION['UID']);
	$stringBuilder = "<div class='property-table-container'>";
	$stringBuilder .= '<table class="outputTable">
            <thead>
                <tr>
                    <th>Property ID</th>
                    <th>Property Type</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Year Built</th>
                    <th>Status</th>
                    <th>Listing Date</th>
                    <th>Delisting Date</th>
                    <th>Modify Listing</th>
                </tr>
            </thead>
            <tbody>';
	foreach ($properties as $property) {
		$RID = $property->realtorID;
		$conn = connect();
		$result = $conn->query('SELECT * FROM `accounts` WHERE AccountID = ' . $RID . ';');
		$conn->close();
		$stringBuilder .= '<tr>
                <td>' . $property->propertyID . '</td>
                <td>' . $property->type . '</td>
                <td>' . $property->city . '</td>
                <td>' . $property->province . '</td>
                <td>$' . $property->price . '</td>
                <td>' . $property->size . ' sq ft </td>
                <td>' . $property->yearbuilt . '</td>
                <td>' . $property->status . '</td>
                <td>' . $property->listingDate . '</td>
                <td>' . (($property->takendowndate == "0000-00-00 00:00:00" || empty($property->takendowndate)) ? 'Active' : $property->takendowndate) . '</td>
                <td>
                    <form method="POST" action="modifyproperty.php">
                        <input type="hidden" id="PID" name="PID" value="' . $property->propertyID . '">
                        <input type="submit" class="btn-edit" value="Edit">
                    </form>
                </td>
            </tr>';
	}
	$stringBuilder .= '</tbody></table></div>';
	echo $stringBuilder;
} else {
	echo "Insufficient Permissions To View This";
}

require './view/footer.php';
?>